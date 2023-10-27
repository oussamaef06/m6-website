const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const codeMassar = document.querySelector('#codeInput').value;

  // Get the data from the sheet
  fetch('data.xlsx')
    .then(response => response.arrayBuffer())
    .then(buffer => {
      const workbook = XLSX.read(buffer, { type: 'buffer' });
      const sheetName = workbook.SheetNames[0];
      const worksheet = workbook.Sheets[sheetName];
      const data = XLSX.utils.sheet_to_json(worksheet);

      // Find the row with the matching code Massar
      const row = data.find(row => row['CNE'] === codeMassar);

      // Populate the form fields
      if (row) {
        document.querySelector('#firstNameInput').value = row['Prénom'];
        document.querySelector('#lastNameInput').value = row['Nom'];
        document.querySelector('#birthdateInput').value = row['Date naissance'];
        document.querySelector('#bacNoteInput').value = row['Note de bac'];
        document.querySelector('#directionInput').value = row['Direction provinciale'];
        document.querySelector('#academieInput').value = row['Academie'];
        document.querySelector('#bacTypeInput').value = row['Type de bac'];
        document.querySelector('#submitButton').classList.remove('disabled');
      } else {
        alert('Code Massar invalide');
      }
    })
    .catch(error => {
      console.error(error);
      alert('Erreur de chargement des données');
    });
});