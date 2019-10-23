$(function () {
	let $form = $('#editUrl');

	$('[data-update-url]').on('click', function () {

		$form.attr('action', this.dataset.updateUrl);
		$form.find('[name="url"]').val(this.dataset.url);

		$form.modal();
	});

	$form.on('hidden.bs.modal', function (e) {
		$form.removeAttr('action');
		$form.find('[name="url"]').removeAttr('value');
		$form.find('[name="reset_conversion"]').prop('checked', false);
	})
});