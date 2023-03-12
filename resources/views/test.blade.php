<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

{{-- <style>
  table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }

  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }

  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }

  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }

  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }

  table td:last-child {
    border-bottom: 0;
  }
}














/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
  </style>

<table>
  <caption>Statement Summary</caption>
  <thead>
    <tr>
      <th scope="col">Account</th>
      <th scope="col">Due Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Period</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="Account">Visa - 3412</td>
      <td data-label="Due Date">04/01/2016</td>
      <td data-label="Amount">$1,190</td>
      <td data-label="Period">03/01/2016 - 03/31/2016</td>
    </tr>
    <tr>
      <td scope="row" data-label="Account">Visa - 6076</td>
      <td data-label="Due Date">03/01/2016</td>
      <td data-label="Amount">$2,443</td>
      <td data-label="Period">02/01/2016 - 02/29/2016</td>
    </tr>
    <tr>
      <td scope="row" data-label="Account">Corporate AMEX</td>
      <td data-label="Due Date">03/01/2016</td>
      <td data-label="Amount">$1,181</td>
      <td data-label="Period">02/01/2016 - 02/29/2016</td>
    </tr>
    <tr>
      <td scope="row" data-label="Acount">Visa - 3412</td>
      <td data-label="Due Date">02/01/2016</td>
      <td data-label="Amount">$842</td>
      <td data-label="Period">01/01/2016 - 01/31/2016</td>
    </tr>
  </tbody>
</table>

<select onchange="location = this.value;">
    <option value="#">Pilih Tautan</option>
    <option value="https://www.google.com"><a href="https://www.google.com">Google</a></option>
    <option value="https://www.yahoo.com"><a href="https://www.yahoo.com">Yahoo</a></option>
    <option value="https://www.bing.com"><a href="https://www.bing.com">Bing</a></option>
  </select> --}}

  {{-- <select class="filter-handle">
  <option value="">Filter by location</option>
  <option value="sunnyvale">Sunnyvale</option>
  <option value="madison">Madison</option>
</select>

<table class="filter-table-data">
  <tr data-type="sunnyvale"><td>1</td><td>Vu Tran</td><td>Sunnyvale</a></tr>
  <tr data-type="sunnyvale"><td>2</td><td>Michelle Case</td><td>Sunnyvale</a></tr>
  <tr data-type="madison"><td>3</td><td>Todd Linden</td><td>Madison</a></tr>
  <tr data-type="madison"><td>4</td><td>Michael Liston</td><td>Madison</a></tr>
</table>

<script>
    $('.filter-handle').on('change', function(e) {
  // retrieve the dropdown selected value
  var location = e.target.value;
  var table = $('.filter-table-data');
  // if a location is selected
  if (location.length) {
    // hide all not matching
    table.find('tr[data-type!=' + location + ']').hide();
    // display all matching
    table.find('tr[data-type=' + location + ']').show();
  } else {
    // location is not selected,
    // display all
    table.find('tr').show();
  }
});
</script> --}}

<input type="text" id="nama">

<script>
$(document).ready(function() {
  $('#nama').on('input', function() {
    $(this).val($(this).val().replace(/\s+/g, '-'));
  });
});
</script>
