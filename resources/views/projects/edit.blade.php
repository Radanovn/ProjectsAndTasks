<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="{{ route('projects.update', $project->id) }}">
                @method('PATCH')     
                @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='Enter your project' />
                    </div>


                    <div class="form-group">
                        <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$project->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="text" name="status" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='Enter your status' />
                    </div>

                    <div class="form-group">
                        <input type="text" name="duration" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='Enter your duration' />
                    </div>

                    <div class="form-group">
                        <input type="text" name="client" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='Enter client' />
                        @if ($errors->has('client'))
                        <span class="text-danger">{{ $errors->first('client') }}</span>
                        @endif
                      </div>

                    <div class="form-group">
                        <input type="text" name="company" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='Enter your company' />
                        @if ($errors->has('company'))
                        <span class="text-danger">{{ $errors->first('company') }}</span>
                        @endif
                      </div>

                    <div class="form-group">
                        <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Project</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>