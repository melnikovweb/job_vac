const url = themeVars.ajaxUrl;
const btnLoadMore = document.getElementById('load-more-btn');
const postsContainer = document.getElementById('post-container');
let loadingPosts = false;

export const filterPosts = () => {
  if (btnLoadMore) {
    let nextPage = btnLoadMore.getAttribute('data-page');
    let categoryPage = btnLoadMore.getAttribute('data-category');
    let type = btnLoadMore.getAttribute('data-type');
    const btnFilterInitialText = btnLoadMore.innerHTML;

    if (loadingPosts) {
      return;
    }
    loadingPosts = true;
    btnLoadMore.classList.add("is-loading");
    btnLoadMore.innerHTML = 'Loading...'; 

    fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `action=filter_by_category&page=${nextPage}&catName=${categoryPage}`,
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
        if (type !== 'filter') {
          postsContainer.innerHTML += data.response_compile;
        }
        if ((data.total_pages <= data.page) && btnLoadMore) {
          btnLoadMore.closest('.wp-block-button') ? btnLoadMore.closest('.wp-block-button').style.display = 'none' : btnLoadMore.style.display = 'none';
        }
        btnLoadMore.dataset.page = 1 + Number(data.page);
      })
      .catch(() => {
        postsContainer.innerHTML += 'Sorry, no posts found. Try to reload the page';
      })
      .finally(() => {
        loadingPosts = false;
        btnLoadMore.classList.remove("is-loading");
        btnLoadMore.innerHTML = btnFilterInitialText;
      })
  }
}

if (btnLoadMore) {
  btnLoadMore.addEventListener('click', () => {
    filterPosts(btnLoadMore);
  })
}
