@extends("layouts.app")

@section("content")
<div class="container mt-5">
    <div class="w-full">
        <div class="flex flex-wrap">
            <h1 class="mb-5">{{ __("Fitxa de l'alumne") }}</h1>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">{{ __("Nom") }}</label>
        <input type="text" class="form-control" value="{{ $alumne->nom }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">{{ __("Cognoms") }}</label>
        <input type="text" class="form-control" value="{{ $alumne->cognoms }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">{{ __("Data de naixement") }}</label>
        <input type="text" class="form-control" value="{{ date_format(new DateTime($alumne->data_naixement), 'd/m/Y') }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">{{ __("Centre") }}</label>
        <input type="text" class="form-control" value="{{ $alumne->centre ? $alumne->centre->nom : __('No assignat') }}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">{{ __("Ensenyament") }}</label>
        <input type="text" class="form-control" value="{{ $alumne->ensenyament ? $alumne->ensenyament->nom : __('No assignat') }}" disabled>
    </div>

    <div class="mb-3">
        <a href="{{ route('alumne.index') }}" class="btn btn-secondary">{{ __("Tornar al llistat") }}</a>
        <a href="{{ route('alumne.edit', ['alumne' => $alumne]) }}" class="btn btn-warning">{{ __("Editar") }}</a>
    </div>
</div>
@endsection