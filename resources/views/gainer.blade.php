<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top Gainers | StockPro</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #1a73e8;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }
    .container {
      padding: 20px;
      max-width: 1200px;
      margin: auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    th, td {
      padding: 12px 15px;
      text-align: center;
    }
    th {
      background-color: #1a73e8;
      color: white;
      cursor: pointer;
      user-select: none;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #e1f0ff;
    }
    .positive {
      color: green;
      font-weight: bold;
    }
    .negative {
      color: red;
      font-weight: bold;
    }
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
  </style>
</head>
<body>
  <header>Top Gainers</header>
  <div class="container">
    <table id="topGainersTable">
      <thead>
        <tr>
          <th onclick="sortTable(0)">Symbol</th>
          <th onclick="sortTable(1)">Company</th>
          <th onclick="sortTable(2)">Price</th>
          <th onclick="sortTable(3)">Change</th>
          <th onclick="sortTable(4)">% Change</th>
          <th onclick="sortTable(5)">Volume</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example data; replace with your dynamic data -->
        <tr class="fade-in">
          <td>AAPL</td>
          <td>Apple Inc.</td>
          <td>$227.76</td>
          <td class="positive">+2.88</td>
          <td class="positive">+1.28%</td>
          <td>42,477,811</td>
        </tr>
        <tr class="fade-in">
          <td>MSFT</td>
          <td>Microsoft Corp.</td>
          <td>$338.45</td>
          <td class="positive">+4.22</td>
          <td class="positive">+1.26%</td>
          <td>25,384,512</td>
        </tr>
        <tr class="fade-in">
          <td>GOOG</td>
          <td>Alphabet Inc.</td>
          <td>$145.32</td>
          <td class="positive">+1.90</td>
          <td class="positive">+1.32%</td>
          <td>18,234,123</td>
        </tr>
        <!-- More rows go here -->
      </tbody>
    </table>
  </div>

  <script>
    // Sorting function for table
    function sortTable(n) {
      const table = document.getElementById("topGainersTable");
      let rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      switching = true;
      dir = "asc";
      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          let xContent = isNaN(parseFloat(x.innerHTML)) ? x.innerHTML.toLowerCase() : parseFloat(x.innerHTML);
          let yContent = isNaN(parseFloat(y.innerHTML)) ? y.innerHTML.toLowerCase() : parseFloat(y.innerHTML);
          if (dir == "asc") {
            if (xContent > yContent) { shouldSwitch = true; break; }
          } else if (dir == "desc") {
            if (xContent < yContent) { shouldSwitch = true; break; }
          }
        }
        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          switchcount++;
        } else {
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
  </script>
</body>
</html>
