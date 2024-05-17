@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">La liste des Articles</h5><br>
        <a href="{{route('article.create')}}"><input type="submit" class="btn btn-primary" value="ajouter un article"></a><br><br>

            <div class="container-fluid">
              <input type="text" id="searchInput" placeholder="Rechercher..." class="form-control">
            </div>
            </div>

            @if(@session('success'))
            <div class="alert-success"><p>{{session('success')}}</p></div>
            @endif

            @if(@session('error'))
            <div class="alert-danger"><p>{{session('error')}}</p></div>
            @endif

          <div class="table-responsive">
            <table
              class="table table-striped table-bordered"
              id="myTable"
            >
              <thead>
                <tr>
                  <th>title</th>
                  <th>Description</th>
                  <th>video</th>
                  <th>image</th>
                  <th>status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($article as $articles)
                <tr>
                  <td>{{ $articles->title }}</td>
                  <td>{{ $articles->description }}</td>
                  <td>{{ $articles->video }}</td>
                  <td>{{ $articles->image }}</td>
                  <td>{{ $articles->status }}</td>
                 
                  <td>
                  <form action="{{ route('article.destroy', $articles->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                          <i class="fas fa-trash"></i>
                      </button>
                  </form>
                  </td>

                  <td>
                      <a href="/admin/edit/{{$articles->id}}">
                      <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir modifier cet article ?')">
                          <i class="fas fa-edit"></i>
                      </button>
                      </a>
                  </td>

                </tr>
                @endforeach

            </table>
            <div class="pagination justify-content-center">
              {{ $article->links() }}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Fonction pour filtrer le tableau
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
    // Ajouter un événement de saisie pour déclencher le filtrage
    document.getElementById("searchInput").addEventListener("input", filterTable);
</script>
@endsection




