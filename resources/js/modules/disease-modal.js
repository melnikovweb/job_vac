import $ from 'jquery';

export default function diseaseModal() {
  // Helpers
  function disableScrolling() {
    var x = window.scrollX;
    var y = window.scrollY;

    window.onscroll = function () {
      window.scrollTo(x, y);
    };
  }

  function enableScrolling() {
    window.onscroll = function () {
    };
  }

  let diseaseModal = $('.disease-modal');
  if (diseaseModal.length) {
    // Close modal
    let closeDiseaseModalBtn = $('.close-disease-modal');
    closeDiseaseModalBtn.on('click', function () {
      $(this).closest('.disease-modal').fadeOut(150);
      enableScrolling();
    });

    // Open modal
    let openDiseaseModal = $('.open-disease-modal');
    if (openDiseaseModal.length) {
      openDiseaseModal.on('click', function () {
        let modalName = $(this).data('modal-name');
        if (modalName.length) {
          let diseaseModal = $('.disease-modal[data-modal-name="' + modalName + '"]');
          if (diseaseModal.length) {
            diseaseModal.fadeIn(150);
            disableScrolling();
          }
        }
      });
    }

    // Open dropdown
    let dropdownTerm = diseaseModal.find('.dropdown-term');
    if (dropdownTerm.length) {
      dropdownTerm.each(function () {
        let termName = $(this).find('.term-name'),
          list = $(this).find('.list');

        if (termName.length && list) {
          termName.on('click', function () {
            list.slideDown(150);
          });

          $(this).on('mouseover', function () {
            list.slideDown(350);
          });

          $(this).on('mouseleave', function () {
            list.slideUp(350);
          });
        }
      });
    }
  }
}
