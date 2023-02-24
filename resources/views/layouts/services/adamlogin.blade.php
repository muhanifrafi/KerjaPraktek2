@if(Auth::check())
<table  class="table table-bordered table-striped" cellspacing=0>
    <thead>
        <th scope="col" width="5%">No.</th>
        <th scope="col" width="20%">Aircraft Type</th>
        <th scope="col" width="45%">Defect</th>
        <th scope="col" width="15%">File</th>
    </thead>
    <tbody id="the-list">    
    @foreach($adams2 as $adam2)
        <tr>
        <td align="center">{{$loop -> iteration}}</td>
        <td align="center">{{$adam2->c_adam_categ}}<br>{{$adam2->n_title}}</a></td>
        <td align="center">{{$adam2->n_adam_defect}}</td>
        <td align="center">
        <button class="view_form btn btn-success" onclick="">Generate Form ADAM</button>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif