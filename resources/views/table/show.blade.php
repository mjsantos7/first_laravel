<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>First Laravel Mini Project</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <script src="https://use.fontawesome.com/b494c279b5.js"></script>
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
        />
        <script
            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
            defer
        ></script>
    </head>
    <body class="bg-blue-100">
        <div class="p-2 container mx-auto mt-4">
            <a
                class="mx-auto bg-blue-400 border-blue-800 px-4 py-1 rounded-xl"
                href="/table"
            >
                Back
            </a>
        </div>

        @if (session()->has('success'))
        <div class="p-4 container mx-auto max-w-full">
            <div
                x-data="{show:true}"
                x-init="setTimeout(()=> show = false, 4000)"
                x-show="show"
                class="
                    bg-blue-500
                    border-2 border-blue-900
                    text-white
                    py-2
                    px-4
                    rounded-xl
                    text-base text-center
                    m-auto
                "
            >
                <p>{{ session("success") }}</p>
            </div>
        </div>
        @endif

        <form
            method="POST"
            action="{{route('activities.update',$activities->id)}}"
            class="
                container
                mx-auto
                flex flex-col
                md:flex-row
                :justify-between
                justify-center
                max-w-md
            "
        >
            @csrf @method ('PUT')
            <div class="p-2 container mx-auto max-w-full">
                <div
                    class="
                        p-4
                        bg-blue-200
                        border-2 border-blue-300
                        rounded-xl
                        m-auto
                    "
                >
                    <p class="text-gray-800 px-2 text-left">
                        Edit the OJT Activity:
                    </p>
                    <div class="p-2">
                        <div>
                            <i class="fa fa-tag p-1" aria-hidden="true"></i>
                            <Label>Title:</Label>
                        </div>
                        <input
                            name="title"
                            type="text"
                            value="{{$activities->title}}"
                            class="rounded p-1 bg-blue-100 w-full"
                            placeholder="Enter Activity Title"
                        />
                        @error('title')
                        <p class="text-red-700 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="p-2">
                        <div>
                            <i class="fas fa-file-alt"></i>
                            <Label>Description:</Label>
                        </div>
                        <textarea
                            name="description"
                            value=""
                            class="rounded p-1 bg-blue-100 w-full"
                            placeholder="{{$activities->description}}"
                        ></textarea>
                        @error('description')
                        <p class="text-red-700 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="px-2 pb-2">
                        <div>
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <Label>Process:</Label>
                        </div>
                        <select
                            name="status"
                            id=""
                            class="rounded p-1 bg-blue-100 w-full"
                        >
                            <option
                                value="{{$activities->status}}"
                                disabled
                                selected
                            >
                                {{$activities->status}}
                            </option>
                            <option value="new">New</option>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                        @error('status')
                        <p class="text-red-700 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="px-2 pb-2">
                        <div>
                            <i class="fas fa-stopwatch"></i>
                            <Label>Due Date:</Label>
                        </div>
                        <input
                            name="duedate"
                            value="{{$activities->duedate}}"
                            type="date"
                            class="rounded p-1 bg-blue-100 w-full"
                        />
                        @error('duedate')
                        <p class="text-red-700 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="
                            bg-blue-400
                            border-blue-800
                            px-4
                            py-1
                            rounded-xl
                            mx-10
                        "
                    >
                        Update
                    </button>
                </div>
            </div>
        </form>
    </body>
</html>
