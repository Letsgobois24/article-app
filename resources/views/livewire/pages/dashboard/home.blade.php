<div>

    <x-title>Welcome Back, {{ auth()->user()->username }}</x-title>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
        <x-ui.card-stat title="Total Posts" :value="$total_posts_all" />
        <x-ui.card-stat title="This Year" :value="$total_posts_year" />
        <x-ui.card-stat title="This Month" :value="$total_posts_month" />

        {{-- Chart Diagram --}}
        <section class="row-start-2 col-span-3">
            <livewire:components.dashboard.home.monthly-graphic lazy />
        </section>

        {{-- Circle Diagram --}}
        <section class="row-start-1 row-end-3">
            <livewire:components.dashboard.home.category-graphic lazy />
        </section>
    </div>
</div>
