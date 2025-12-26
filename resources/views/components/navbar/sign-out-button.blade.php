<form action="/sign-out" method="POST">
    @csrf
    <button type="submit"
        class="text-sm cursor-pointer inline-flex w-full items-center rounded p-2 group font-semibold">Sign Out
        <span class="group-hover:translate-x-1 inline-block transition ml-1" aria-hidden="true">&rarr;</span></button>
</form>
