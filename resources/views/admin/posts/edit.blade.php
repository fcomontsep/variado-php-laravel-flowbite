<x-layouts.app :title="__('Posts')">
	<div class="mb-8 flex justify-between items-center">
		<flux:breadcrumbs>
			<flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
			<flux:breadcrumbs.item :href="route('admin.posts.index')">Posts</flux:breadcrumbs.item>
			<flux:breadcrumbs.item>Editar</flux:breadcrumbs.item>
		</flux:breadcrumbs>
	</div>
	<form action="{{ route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
		@csrf
		@method('PUT')
		<div class="relative">

			<img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{ $post->image_path ? Storage::url($post->image_path) : "https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"}}">
			<div class="absolute top-4 right-4">
				<label class="bg-white px-4 py-2 rounded-lg cursor-pointer">
					Cambiar imagen
					<input class="hidden" type="file" name="image" accepts="image/*" onchange="preview_image(event, '#imgPreview')">
				</label>
			</div>	
		</div>
		
		<div class="card">

			<flux:input label="Título" name="title" value="{{ old('title', $post->title) }}" placeholder="Escribe el título del post" class="mb-4"/>
			<flux:input id="slug" label="Slug" name="slug" value="{{ old('slug', $post->slug) }}" placeholder="Escribe el slug del post" class="mb-4"/>
			
			<flux:select label="Categoria" name="category_id" placeholder="Escoge la categoría...">
				@foreach ($categories as $category)
					<flux:select.option value="{{ $category->id }}" :selected="$category->id == old('category_id', $post->category_id)">{{ $category->name }}</flux:select.option>
				@endforeach
			</flux:select>

			<flux:textarea label="Resumen" name="excerpt">{{old('excerpt', $post->excerpt)}}</flux:textearea>

			<flux:textarea label="Contenido" name="content" rows="16">{{old('content', $post->content)}}</flux:textearea>

			<div class="space-x-2">
				<label>
					<input type="radio" name="is_published" value="0" @checked(old('is_published', $post->is_published) == 0)>
					<span class="ml-2">
						No publicado
					</span>
				</label>
				<label>
					<input type="radio" name="is_published" value="1" @checked(old('is_published', $post->is_published) == 1)>
					<span class="ml-2">
						Publicado
					</span>
				</label>
			</div>

			<div class="flex justify-end">
				<flux:button variant="primary" type="submit">
					Enviar
				</flux:button>
			</div>	
		</div>
	</form>
</x-layouts.app>