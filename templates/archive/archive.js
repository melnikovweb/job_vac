const url = themeVars.ajaxUrl;
const btnLoadMore = document.getElementById('load-more-btn');
const btnEventLoadMore = document.getElementById('events-load-more-btn');
const filtersContainer = document.getElementById('subcategories');
const postsContainer = document.getElementById('post-container');
const postsEventsContainer = document.getElementById('events-post-container');
let loadingPosts = false;

export const filterPosts = (btnFilter) => {
    if (btnFilter) {
        let categoryPage = btnFilter.getAttribute('data-category');
        let nextPage = btnFilter.getAttribute('data-page');
        let type = btnFilter.getAttribute('data-type');
        let isPastEvents = btnFilter.getAttribute('data-past-events');
        const btnFilterInitialText = btnFilter.innerHTML;


        if (loadingPosts) {
            return;
        }
        
        loadingPosts = true; 
        btnFilter.classList.add("is-loading");
        btnFilter.innerHTML = 'Loading...'; 

        fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=filter_by_category&page=${nextPage}&catName=${categoryPage}&isPastEvents=${isPastEvents}`,
        })
            .then(response => {
                if (!response.ok) {
                    if (response.status === 503) {
                      return new Promise((resolve) => setTimeout(resolve, 3000)).then(filterPosts);
                    } else {
                      throw new Error('Sorry, no posts found. Please try to refresh the page');
                    }
                  }
                return response.json()
            })
            .then(data => {
                if (type === 'filter') {
                    postsContainer.innerHTML = data.response_compile;
                    const allFilterButtons = Array.from(btnFilter.closest('.subcategories').querySelectorAll('.filterbtn'));
                    let previousActiveFilter = allFilterButtons.find((e) => { return e.classList.contains('active') });
                    if (previousActiveFilter) {
                        previousActiveFilter.classList.remove('active');
                    }
                    btnFilter.classList.add('active');

                    if ((data.total_pages <= data.page) && btnLoadMore) {
                        btnLoadMore.closest('.wp-block-button') ? btnLoadMore.closest('.wp-block-button').style.display = 'none' : btnLoadMore.style.display = 'none';
                    } else {
                        if (btnLoadMore) {
                            btnLoadMore.dataset.category = categoryPage;
                            btnLoadMore.closest('.wp-block-button') ? btnLoadMore.closest('.wp-block-button').style.display = 'block' : btnLoadMore.style.display = 'inline-block';
                        }
                    }

                } else if (type === 'loadmore-events') {                
                    postsEventsContainer.innerHTML += data.response_compile;
                    if ((data.total_pages <= data.page) && btnEventLoadMore) {
                        
                        btnEventLoadMore.closest('.wp-block-button') ? btnEventLoadMore.closest('.wp-block-button').style.display = 'none' : btnEventLoadMore.style.display = 'none';
                    }

                    if ((data.total_pages <= data.page) && btnEventLoadMore) {
                        btnEventLoadMore.closest('.wp-block-button') ? btnEventLoadMore.closest('.wp-block-button').style.display = 'none' : btnEventLoadMore.style.display = 'none';
                    } else {
                        if (btnEventLoadMore) {
                            btnEventLoadMore.dataset.category = categoryPage;
                            btnEventLoadMore.closest('.wp-block-button') ? btnEventLoadMore.closest('.wp-block-button').style.display = 'block' : btnEventLoadMore.style.display = 'inline-block';
                        }
                    }

                } else  {
                    postsContainer.innerHTML += data.response_compile;
                    if ((data.total_pages <= data.page) && btnLoadMore) {
                        btnLoadMore.closest('.wp-block-button') ? btnLoadMore.closest('.wp-block-button').style.display = 'none' : btnLoadMore.style.display = 'none';
                    }
                }
                if (btnLoadMore) {
                    btnLoadMore.dataset.page = 1 + Number(data.page);
                }
                if (btnEventLoadMore) {
                    btnEventLoadMore.dataset.page = 1 + Number(data.page);
                }

            })
            .catch((err) => {
                console.log(err);
                postsContainer.innerHTML += 'Sorry, no posts found. Please try to refresh the page';
            })
            .finally(()=> {
                loadingPosts = false;
                btnFilter.classList.remove("is-loading");
                btnFilter.innerHTML = btnFilterInitialText;
            })
    }
}

if (btnLoadMore) {
    btnLoadMore.addEventListener('click', () => {
        filterPosts(btnLoadMore);
    })
}
if (btnEventLoadMore) {
    btnEventLoadMore.addEventListener('click', () => {
        filterPosts(btnEventLoadMore);
    })
}

if (filtersContainer) {
    filtersContainer.addEventListener('click', (el) => {
        if (el.target.classList.contains('filterbtn')) {
            filterPosts(el.target);
        }
    })
}
