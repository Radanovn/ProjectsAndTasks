<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <div class="flex">
          <div class="flex-auto text-2xl mb-4">Projects List</div>

          <div class="flex-auto text-right mt-2">
            <a href="{{ route('projects.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Project</a>
          </div>
        </div>
        <table class="w-full text-md rounded mb-4">
          <thead>
            <tr class="border-b">
              <th class="text-left p-3 px-5">ID</th>
              <th class="text-left p-3 px-5">Title</th>
              <th class="text-left p-3 px-5">Description</th>
              <th class="text-left p-3 px-5">Status</th>
              <th class="text-left p-3 px-5">Duration</th>
              <th class="text-left p-3 px-5">Client</th>
              <th class="text-left p-3 px-5">Company</th>
              <th class="text-left p-3 px-5">Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach(auth()->user()->projects as $project)
            <tr>
            <tr class="border-b hover:bg-orange-100">
              <td class="p-3 px-5">
                {{$project->id}}
              </td>
              <td class="p-3 px-5">
                {{$project->title}}
              </td>
              <td class="p-3 px-5">
                {{$project->description}}
              </td>
              <td class="p-3 px-5">
                {{$project->status}}
              </td>
              <td class="p-3 px-5">
                {{$project->duration}}
              </td>
              <td class="p-3 px-5">
                {{$project->client}}
              </td>
              <td class="p-3 px-5">
                {{$project->company}}
              </td>
              <td class="p-3 px-5">
                <a href="{{ route('projects.edit',$project->id)}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                <a href="{{ route('tasks.index',$project->id)}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Show</a>
                <form action="{{ route('projects.destroy', $project->id)}}" method="post" class="inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit"class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>