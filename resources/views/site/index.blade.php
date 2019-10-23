<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Сервис коротких ссылок</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>

	<div class="container">
		{{--Добавление нового сокращения--}}
		<form action="{{ route('site.urls.store') }}" class="card mt-3" method="post">
			{!! csrf_field() !!}

			<div class="card-body">
				<div class="form-group">
					<label>Адрес для сокращения</label>
					<input type="text" name="url" class="form-control" placeholder="http://yandex.ru" required>
				</div>
			</div>

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Сократить</button>
			</div>
		</form>

		@if($createdUrl)
			<div class="alert alert-success mt-5" role="alert">
				Короткая ссылка создана: <strong>{{ env('APP_URL') }}/{{ $createdUrl->id }}</strong>
			</div>
		@endif

		@if($urls->count())
			<div class="card mt-5">
				<div class="table-responsive">
					<table class="table table-striped table-hover mb-0">
						<tr>
							<th>Короткая ссылка</th>
							<th>Оригинальная ссылка</th>
							<th>Количество переходов</th>
							<th>Дата создания</th>
							<th></th>
						</tr>
						@foreach($urls as $url)
							<tr>
								<td>
									<a target="_blank" href="{{ $url->getShortUrl() }}">{{ $url->getShortUrl() }}</a>
								</td>
								<td>{{ $url->url }}</td>
								<td class="text-right">{{ $url->conversion }}</td>
								<td>{{ $url->created_at->format('d.m.Y H:i:s') }}</td>
								<td>
									<form class="btn-group btn-group-sm mt-2" action="{{ route('site.urls.delete', compact('url')) }}" method="post">
										<button
											type="button"
											class="btn btn-primary"
											data-update-url="{{ route('site.urls.update', compact('url')) }}"
											data-url="{{ $url->url }}"
										>Редактировать</button>

										{!! csrf_field() !!}
										{!! method_field('delete') !!}

										<button
											type="submit"
											class="btn btn-danger"
											data-delete-url
										>Удалить</button>
									</form>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>

		@if($urls->lastPage() > 1)
				<div class="mt-2">
					{!! $urls->render() !!}
				</div>
		@endif

		@endif
	</div>

	<form method="post" class="modal fade" id="editUrl" tabindex="-1" role="dialog" aria-labelledby="editUrlLabel" aria-hidden="true">
		{!! csrf_field() !!}
		{!! method_field('put') !!}
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editUrlLabel">Редактирование ссылки</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Адрес</label>
						<input class="form-control" type="text" name="url" required>
					</div>

					<div class="form-group form-check">
						<input type="checkbox" name="reset_conversion" value="1" class="form-check-input" id="resetConversion">
						<label class="form-check-label" for="resetConversion">Сбросить переходы</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Сохранить</button>
				</div>
			</div>
		</div>
	</form>

	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>