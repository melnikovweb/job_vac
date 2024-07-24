export const toggleSearchStyles = () => {
    const searchPanel = document.getElementById("search-panel");

    if (searchPanel) {
        document.addEventListener("click", (el) => {
            if (el.target.closest('.search-button')) {
                searchPanel.classList.add("active");
                searchPanel.querySelector("input").focus();
                searchPanel.querySelector("input").placeholder = "Type your keywords";
            } else if (el.target.closest('.close-button')) {
                searchPanel.classList.remove("active");
            }
        }
        )
    }
}

