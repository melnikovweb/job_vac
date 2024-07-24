export const openMenuSubitems = (el) => {
    if (el.target.closest('.nav-button')) {
        const accordionItems = Array.from(el.target.closest('.nav-wrapper--active').querySelectorAll('.menu-item-has-children'));
        const clickedItem = el.target.closest('.menu-item-has-children');

        toggleAccordionContent(clickedItem, accordionItems);
    }

    function toggleAccordionContent(item, accordionItems) {
        if (!item.classList.contains('active')) {
            const openedItem = accordionItems.find((e) => { return e.classList.contains('active') });
            if (openedItem) {
                openedItem.classList.remove('active');
            }
        }
        item.classList.toggle('active');
    }
}
