const submenu = document.getElementById('submenu')

if (submenu) {
    document.addEventListener("click", (el) => {
        if (el.target.closest('.submenu-button')) {
            const postCategory = el.target.closest('.submenu-button').getAttribute('data-category');
            let queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            urlParams.delete('category_name');
            urlParams.set('category_name', postCategory);
            const updatedQueryString = urlParams.toString();

            const newURL = window.location.origin + window.location.pathname + "?" + updatedQueryString;
            document.location.href = newURL;
        }
    })
}

