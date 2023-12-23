// Fetch data from the server and populate the table
document.addEventListener('DOMContentLoaded', () => {
    fetchDataAndPopulateTable();
  });
  
  // Function to fetch data from the server and populate the table
  function fetchDataAndPopulateTable() {
    fetch('get-fees-data.php')
      .then(response => response.json())
      .then(data => {
        const feesData = document.getElementById('feesData');
        data.forEach(student => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${student.student_id}</td>
            <td>${student.name}</td>
            <td>${student.fees}</td>
          `;
          feesData.appendChild(row);
        });
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }
  