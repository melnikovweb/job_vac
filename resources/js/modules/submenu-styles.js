export const changeSubmenuStyles = () => {

    const submenu = document.getElementById('submenu');
    const submenuParent = document.querySelector('.hero-white');
    
    function handleScroll() {
      const submenuRect = submenuParent.getBoundingClientRect();
      const scrollY = window.scrollY;
    
      const submenuTop = submenuRect.top;
      const mainHeader = document.getElementById('header');
    
      if (submenuTop <= scrollY) {
        if (window.screen.width > 768) {
          mainHeader.querySelector('.search-container')?.classList.add('hidden');
        }
        submenu.classList.add('positioned');
      } else if (submenuTop > scrollY) {
        if (window.screen.width > 768) {
          mainHeader.querySelector('.search-container')?.classList.remove('hidden');
        }
        submenu.classList.remove('positioned');
      }
    }
    
    window.addEventListener('scroll', handleScroll);
}