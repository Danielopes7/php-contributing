<!-- resources/views/pedidos/index.blade.php -->

@extends('layouts.app')

@section('title', 'Lista de Pedidos')

@section('content')
<section class="container max-w-6xl mx-auto flex flex-col md:flex-row">
    <section class="masthead font-sans pt-6 border-r border-black px-6 text-vanilla-300 flex-none w-full md:max-w-sm">
        <div>
            <h3 class="section-heading">About</h3>
            <p class="text-sm"> Good First Issue curates easy pickings from popular open-source projects, and helps you make your first contribution to open-source. </p>
        </div>
        <div class="pt-6">
            <h3 class="section-heading">Browse by type of issue</h3>
            <div>
            <a href="/language/python" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">Bug <span class="text-vanilla-400 group-hover:text-juniper">× 79</span></a>
            </div>
        </div>
        <div class="pt-6">
            <h3 class="section-heading">Browse by type of project</h3>
            <div>
                <a href="/language/python" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Small <span class="text-vanilla-400 group-hover:text-juniper">× 79</span>
                </a>
                <a href="/language/python" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Medium <span class="text-vanilla-400 group-hover:text-juniper">× 79</span>
                </a>
                <a href="/language/python" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Big <span class="text-vanilla-400 group-hover:text-juniper">× 79</span>
                </a>
            </div>
        </div>
        <div class="pt-6">
            <h3 class="section-heading">Browse by Framework</h3>
            <div>
                <a href="/language/python" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Laravel <span class="text-vanilla-400 group-hover:text-juniper">× 79</span>
                </a>
                <a href="/language/python" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Symfony <span class="text-vanilla-400 group-hover:text-juniper">× 79</span>
                </a>
                <a href="/language/python" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Big <span class="text-vanilla-400 group-hover:text-juniper">× 79</span>
                </a>
            </div>
        </div>
        <div class="pt-6">
            <a class="bg-juniper hover:bg-light_juniper text-ink-400 uppercase rounded-md font-bold text-center px-1 py-3 flex flex-row items-center justify-center space-x-1" href="https://github.com/deepsourcelabs/good-first-issue#adding-a-new-project" target="_blank" rel="noopener noreferrer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 stroke-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Add your project</span>
            </a>
        </div>
    </section>
    <div class="p-6 w-full">
        <div id="repo-243175714" class="border-black select-none border w-full rounded-md mb-4 cursor-pointer hover:bg-neutral-200 group">
            <div class="px-5 py-3">
                <div class="flex flex-row">
                    <a title="Open hamaluik/timecop on GitHub" href="https://github.com/hamaluik/timecop" target="_blank" rel="noopener noreferrer" class="text-lg font-semibold group-hover:text-juniper">hamaluik / timecop</a>
                    <span class="flex-1"></span>
                    <span class="hidden md:inline text-sm border px-3 py-1 ml-2 rounded-full font-semibold text-vanilla-200">1 issue</span>
                </div>
                <div class="flex-row flex text-sm py-1 overflow-auto">
                    A time tracking app that respects your privacy and the gets the job done without being fancy.
                </div>
                <div class="flex-row flex text-sm py-1 font-mono text-vanilla-400">
                    <div class="mr-4">
                        <span class="text-vanilla-400">lang: </span>Dart
                    </div>
                    <div class="mr-4">
                        <span class="text-vanilla-400">stars: </span>796
                    </div>
                    <div class="mr-4">
                        <span class="text-vanilla-400">last activity: </span>
                        <span>2 months ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
