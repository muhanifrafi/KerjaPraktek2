<div id="pagination" class="pagination pull-right"></div>
<script>
var currentPage = 1; // current page number
var totalPages = {{$a}}; // total number of pages
// function to generate pagination links
function generatePaginationLinks() {
  var totalPages = {{$a}};
  var paginationLinks = '';
  var numPagesToShow = 10; // number of pages to show at once
  var halfNumPages = Math.floor(numPagesToShow / 2);
  var startPage = Math.max(currentPage - halfNumPages, 1);
  var endPage = Math.min(startPage + numPagesToShow - 1, totalPages);
  if (totalPages === 1) {
    // hide pagination element if there is only one page
    document.getElementById('pagination').style.display = 'none';
    return;
  }
  // add "previous" link if not on first page
  if (currentPage > 1) {
    paginationLinks += '<a href="#" onclick="goToPage(' + (currentPage - 1) + ')">« previous</a>';
  } else {
    paginationLinks += '<span class="disabled">« previous</span>';
  }
 
  // add individual page links
   // add first page link
   if (startPage > 1) {
    paginationLinks += '<a href="#" onclick="goToPage(1)">1</a>';
    if (startPage > 2) {
      paginationLinks += '<span>...</span>';
    }
  }

  // add individual page links
  for (var i = startPage; i <= endPage; i++) {
    if (i == currentPage) {
      paginationLinks += '<span class="current">' + i + '</span>';
    } else {
      paginationLinks += '<a href="#" onclick="goToPage(' + i + ')">' + i + '</a>';
    }
  }

  // add last page link
  if (endPage < totalPages) {
    if (endPage < totalPages - 1) {
      paginationLinks += '<span>...</span>';
    }
    paginationLinks += '<a href="#" onclick="goToPage(' + totalPages + ')">' + totalPages + '</a>';
  }
  // add "next" link if not on last page
  if (currentPage < totalPages) {
    paginationLinks += '<a href="#" onclick="goToPage(' + (currentPage + 1) + ')">next »</a>';
  } else {
    paginationLinks += '<span class="disabled">next »</span>';
  }
  // update pagination element with generated links
  var pageInfo = 'Page ' + currentPage + ' of ' + totalPages;
  paginationLinks = '{{$b}} Entries<span class="fa fa-gear"></span> ' + pageInfo + ' <span class="fa fa-fighter-jet"></span> ' + paginationLinks;
  document.getElementById('pagination').innerHTML = paginationLinks;
}

// function to handle page navigation
function goToPage(pageNumber) {
  event.preventDefault();
  currentPage = pageNumber;
  var formData = $('form[name=searchform]').serialize() + '&page=' + currentPage;

  $.ajax({
    url: '{{$c}}',
    type: 'GET',
    data: formData,
    success: function(response) {
      document.getElementById('targetview').innerHTML = response;
      totalPages = {{ $a}}; // update totalPages value
      generatePaginationLinks();
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus + ': ' + errorThrown);
    }
  });
}

$(document).ready(function() {
  // initialize pagination links on page load
  generatePaginationLinks();
  $('#search-btn').on('click', function() {
    var formData = $('form[name=searchform]').serialize();
    $.ajax({
      url: '{{$c}}',
      type: 'GET',
      data: formData,
      success: function(response) {
        $('div#targetview').html(response);
        currentPage = 1; // reset currentPage to 1
        totalPages = {{$a}}; // update totalPages value
        generatePaginationLinks();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus + ': ' + errorThrown);
      }
    });
  });
});
</script>