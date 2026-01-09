<x-layouts.app :title="__('Posts')">
	<div class="mb-8 flex justify-between items-center">
		<flux:breadcrumbs>
			<flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
			<flux:breadcrumbs.item :href="route('admin.posts.index')">Posts</flux:breadcrumbs.item>
			<flux:breadcrumbs.item>Nuevo</flux:breadcrumbs.item>
		</flux:breadcrumbs>
	</div>

	<div class="card">
		<form action="{{ route('admin.posts.store')}}" method="POST" class="space-y-4">
			@csrf
			<flux:input oninput="string_to_slug(this.value, '#slug')" label="Título" name="title" value="{{ old('title') }}" placeholder="Escribe el título del post" class="mb-4"/>
			<flux:input id="slug" label="Slug" name="slug" value="{{ old('slug') }}" placeholder="Escribe el slug del post" class="mb-4"/>
			
			<flux:select label="Categoria" name="category_id" placeholder="Escoge la categoría...">
				@foreach ($categories as $category)
					<flux:select.option value="{{ $category->id }}" :selected="$category->id == old('category_id')">{{ $category->name }}</flux:select.option>
				@endforeach
			</flux:select>


			<div class="flex justify-end">
				<flux:button variant="primary" type="submit">
					Enviar
				</flux:button>
			</div>
		</form>
	</div>
</x-layouts.app>