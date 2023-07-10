@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  td {
    text-align: center;
  }
</style>

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
    <div>
      <input type="text" id="search" placeholder="Search departments">
      <button id="searchBtn" class="btn btn-primary">Search</button>
    </div>
    <div>
      <a href="{{ url('department/create')}}" class="btn btn-secondary">Create</a>
    </div>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <td>Department ID</td>
        <td>Department Name</td>
        <td colspan="2">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach($Products as $Product)
      <tr>
        <td>{{$Product->dept_id}}</td>
        <td>{{$Product->name}}</td>
        <td><a href="{{ route('department.edit', $Product->dept_id)}}" class="btn btn-primary">Edit</a></td>
        <td>
          <form action="{{ route('department.destroy', $Product->dept_id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <ul id="results"></ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const searchInput = document.getElementById('search');
  const searchButton = document.getElementById('searchBtn');
  const resultsList = document.getElementById('results');

  function performSearch() {
    const searchTerm = searchInput.value;

    if (searchTerm.trim() !== '') {
      axios.get('/departments/search', {
        params: {
          term: searchTerm
        }
      })
      .then(function(response) {
        const departments = response.data;

        // Clear previous results
        resultsList.innerHTML = '';

        // Append new results
        departments.forEach(function(department) {
          const li = document.createElement('li');
          li.textContent = department.name;
          resultsList.appendChild(li);
        });
      })
      .catch(function(error) {
        console.error(error);
      });
    } else {
      // Clear the results if the search term is empty
      resultsList.innerHTML = '';
    }
  }

  searchButton.addEventListener('click', function(event) {
    event.preventDefault();
    performSearch();
  });

  searchInput.addEventListener('input', function() {
    performSearch();
  });
</script>
@endsection
