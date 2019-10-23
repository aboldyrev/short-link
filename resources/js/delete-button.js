$(function () {
	$('[data-delete-url]').on('click', function () {
		return confirm('Вы действительно хотите удалить ссылку');
	})
});