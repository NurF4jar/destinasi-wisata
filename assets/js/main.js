jQuery(document).ready(function( $ ) {

  // Initiate the wowjs
  new WOW().init();

	// $('#modalform_detail').on('show.bs.modal', function (event) {
	// 	var button = $(event.relatedTarget); // Button that triggered the modal
	// 	  var recipient = button.data('whatever'); // Extract info from data-* attributes
	// 	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	// 	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	// 	  var modal = $(this);
	// 	  modal.find('.modal-title').text('Edit / ' + recipient);
	// 	  modal.find('.modal-body input').val(recipient);
  //     // alert($('#editor1').val());
  //     CKEDITOR.instances.editor1.setData(button.data("value"));
  //     $('#editor1').attr('name', button.data('field'));
	// });

  // $('#modalform_detail').on('show.bs.modal', function (event) {
  //   var modaltype = event.relatedTarget.dataset.whatever;
  //   var button = $(event.relatedTarget); // Button that triggered the modal
  //     var recipient = button.data('whatever'); // Extract info from data-* attributes
  //     // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  //     // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  //     var modal = $(this);
  //     modal.find('.modal-title').text('Edit / ' + modaltype);
  //     modal.find('.modal-body input').val(modaltype);
  //     // alert($('#editor1').val());
  //     CKEDITOR.instances.editor1.setData(button.data("value"));
  //     $('#editor1').attr('name', button.data('field'));
  //
  // });

	$(function () {
	    CKEDITOR.replace('editor1');

      // var textarea = document.body.appendChild( document.createElement( 'textarea' ) );
      // CKEDITOR.replace('textarea');
	});


	$(document).ready(function() {
	  $.uploadPreview({
	    input_field: "#image-upload",
	    preview_box: "#image-preview",
	    label_field: "#image-label"
	  });
	});

	$(document).ready(function() {
	  $.uploadPreview({
	    input_field: "#image-upload1",
	    preview_box: "#image-preview1",
	    label_field: "#image-label1"
	  });
	});

	$(document).ready(function() {
	  $.uploadPreview({
	    input_field: "#image-upload2",
	    preview_box: "#image-preview2",
	    label_field: "#image-label2"
	  });
	});

	$(document).ready(function() {
	  $.uploadPreview({
	    input_field: "#image-upload3",
	    preview_box: "#image-preview3",
	    label_field: "#image-label3"
	  });
	});

	$(document).ready(function() {
	  $.uploadPreview({
	    input_field: "#image-upload4",
	    preview_box: "#image-preview4",
	    label_field: "#image-label4"
	  });
	});

  $(document).ready(function() {
    $.uploadPreview({
      input_field: "#image-upload5",
      preview_box: "#image-preview5",
      label_field: "#image-label5"
    });
  });


	 // Gallery - uses the magnific popup jQuery plugin
	  $('.gallery-popup').magnificPopup({
	    type: 'image',
	    removalDelay: 300,
	    mainClass: 'mfp-fade',
	    gallery: {
	      enabled: true
	    },
	    zoom: {
	      enabled: true,
	      duration: 300,
	      easing: 'ease-in-out',
	      opener: function(openerElement) {
	        return openerElement.is('img') ? openerElement : openerElement.find('img');
	      }
	    }
	  });

});
