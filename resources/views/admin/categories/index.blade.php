<x-layouts.app :title="__('Categorías')">

	<div class="mb-8 flex justify-between items-center">
		<flux:breadcrumbs>
			<flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
			<flux:breadcrumbs.item>Categorías</flux:breadcrumbs.item>
		</flux:breadcrumbs>

		<a href="{{ route('admin.categories.create') }}" class="btn btn-blue text-xs">
			Nuevo
		</a>
	</div>

	<div class="mt-10 relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
		<table class="w-full text-sm text-left rtl:text-right text-body">
			<thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
				<tr>
					<th scope="col" class="px-6 py-3">
						ID
					</th>
					<th scope="col" class="px-6 py-3">
						NAME
					</th>
					<th scope="col" class="px-6 py-3">
						EDIT
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr class="bg-neutral-primary border-b border-default">
						<th scope="row" class="px-6 py-4 text-heading whitespace-nowrap">
							{{ $category->id }}
						</th>
						<td class="px-6 py-4">
							{{ $category->name }}
						</td>
						<td class="px-6 py-4">
							231
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</x-layouts.app>
