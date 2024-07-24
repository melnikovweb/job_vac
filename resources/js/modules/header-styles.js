export const changeHeaderStyle = (headerInitialClass) => {
    const header = document.getElementById('header');
    const headerHeight = header.offsetHeight;
    document.onscroll = () => {
        const scrollY = window.scrollY;
        if ((scrollY >  headerHeight) && (scrollY < headerHeight + 120)) {
            header.classList.remove(headerInitialClass);
            header.classList.add('sticky-header--default');
        } else if (scrollY <= headerHeight) {
            if (document.querySelector('.burger-active')) {
                header.classList.remove('sticky-header--default');
                header.classList.add('sticky-header--transparent-full');
            } else {
                header.classList.add(headerInitialClass);
                header.classList.remove('sticky-header--default');
            }

        } else {
            return
        }
    }
}