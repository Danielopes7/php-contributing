<section class="container max-w-6xl mx-auto flex flex-col md:flex-row">

        <section class="masthead font-sans pt-6 border-r border-black px-6 text-vanilla-300 flex-none w-full md:max-w-sm">
        <div>
            <h3 class="section-heading">About</h3>
            <p class="text-sm"> Good First Issue curates easy pickings from popular open-source projects, and helps you make your first contribution to open-source. </p>
        </div>
        <div class="pt-6">
            <h3 class="section-heading">Browse by type of issue</h3>
            <div>
                <button wire:click="reloadIssues('bug')" id="small" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Bug 
                    <!-- TODO <span class="text-vanilla-400 group-hover:text-juniper">× 79</span> -->
                </button>
                <button  wire:click="reloadIssues('enhancement')" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Enhancement 
                </button>
                <button wire:click="reloadIssues('fix')" class="border-slate border-black hover:text-juniper hover:border-juniper group mx-1 border px-2 py-1 inline-block rounded-sm my-1 text-sm">
                    Fix 
                </button>
            </div>
        </div>
        <div class="pt-6">
            <a class="bg-white hover:bg-white text-ink-400 uppercase rounded-md font-bold text-center px-1 py-3 flex flex-row items-center justify-center space-x-1" href="https://github.com/Danielopes7/good-first-issue" target="_blank" rel="noopener noreferrer">
                <svg height="32" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="32" data-view-component="true" class="octicon octicon-mark-github v-align-middle">
                    <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.22 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                </svg>
                <span>  Follow this project</span>
            </a>
        </div>
    </section>
    <div class="p-6 w-full">
        @foreach($issues as $issue)
            <div id="issue-{{ $issue->issue_id }}" class="border-black select-none border w-full rounded-md mb-4 cursor-pointer hover:bg-neutral-200 group">
            <div class="px-5 py-3">
                <div class="flex flex-row">
                    <a title="{{ $issue->repository->full_name }}" href="https://github.com/{{ $issue->repository->full_name }}" target="_blank" rel="noopener noreferrer" class="text-md font-semibold group-hover:text-juniper text-gray-500 hover:bg-white">{{ $issue->repository->full_name }}</a>
                    <span class="flex-1"></span>
                    <div class="mr-4">
                        <span class="text-vanilla-400">💬 comments: </span>{{ $issue->comments }}
                    </div>
                </div>
                <div class="flex flex-row">
                    <a title="{{ $issue->title }}" href="{{ $issue->html_url }}" target="_blank" rel="noopener noreferrer" class="text-lg font-semibold group-hover:text-juniper hover:bg-white">{{ $issue->title }}</a>
                    <span class="flex-1"></span>
                </div>
                <div class="flex-row flex text-sm py-1 overflow-auto">
                    {{ Str::limit($issue->body, 200, '[click to know more]') }}
                </div>
                <ul class="flex items-center space-x-2">
                    <li class="flex items-center">
                        <img src="{{$issue->user_avatar_url}}" alt="" class="h-4 w-4 rounded-full mr-2">
                        {{$issue->user_login}}
                    </li>
                    <!-- <span aria-hidden="true" class="text-gray-400">·</span>
                    <li class="flex items-center">
                        Opened&nbsp; 
                        <div title="1/01/2024, 07:35 GMT-3" class="truncate" >
                            <span title="1/01/2024, 07:35 GMT-3" class="text-gray-600">on 1/01</span>
                        </div>
                    </li>
                    <span aria-hidden="true" class="text-gray-400">·</span>
                    <li class="flex items-center">
                        <a href="{{ $issue->html_url }}" target="_blank" class="text-blue-500 hover:underline">#447</a>
                    </li> -->
                </ul>
                <div class="flex text-sm py-1 font-mono text-vanilla-400 flex-wrap">
                    @foreach($issue->labels as $label)
                        <div class="mr-2 mt-2">
                            <span class="hidden md:inline text-sm border px-3 py-1 ml-2 rounded-full font-semibold text-vanilla-200">{{ $label->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
