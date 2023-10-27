function updateProgramChoices() {
  var bacType = document.getElementById("bacTypeInput").value;
  var programChoices1 = document.getElementsByName("flexRadioDefault1");
  var programChoices2 = document.getElementsByName("flexRadioDefault2");
  var programChoices3 = document.getElementsByName("flexRadioDefault3");
  var programChoices4 = document.getElementsByName("flexRadioDefault4");

  // Disable all program choices
  disableProgramChoices(programChoices1);
  disableProgramChoices(programChoices2);
  disableProgramChoices(programChoices3);
  disableProgramChoices(programChoices4);

  // Enable program choices based on the selected bacType
  if (
    bacType.includes("2ème Année Bac Sciences Mathématiques A") ||
    bacType.includes(
      "2ème Année Bac Sciences Mathématiques A - Option Français"
    ) ||
    bacType.includes(
      "2ème Année Bac Sciences Mathématiques B - Option Français"
    ) ||
    bacType.includes("2ème Année Bac Sciences Mathématiques B") ||
    bacType.includes("2ème Année Bac Sciences Physiques") ||
    bacType.includes("2ème Année Bac Sciences Physiques - Option Français")
  ) {
    enableProgramChoices(programChoices1, ["MCW", "CG", "SE", "PROD"]);
    enableProgramChoices(programChoices2, ["MCW", "CG", "SE", "PROD"]);
    enableProgramChoices(programChoices3, ["MCW", "CG", "SE", "PROD"]);
    enableProgramChoices(programChoices4, ["MCW", "CG", "SE", "PROD"]);
  } else if (
    bacType.includes("2ème Année Bac Sciences de la Vie et de la Terre") ||
    bacType.includes(
      "2ème Année Bac Sciences de la Vie et de la Terre - Option Français"
    )
  ) {
    enableProgramChoices(programChoices1, ["MCW", "CG"]);
    enableProgramChoices(programChoices2, ["MCW", "CG"]);
    enableProgramChoices(programChoices3, ["MCW", "CG"]);
    enableProgramChoices(programChoices4, ["MCW", "CG"]);
  } else if (
    bacType.includes("2ème Année Bac Sciences et Technologies Électriques")
  ) {
    enableProgramChoices(programChoices1, ["MCW", "PROD", "SE"]);
    enableProgramChoices(programChoices2, ["MCW", "PROD", "SE"]);
    enableProgramChoices(programChoices3, ["MCW", "PROD", "SE"]);
    enableProgramChoices(programChoices4, ["MCW", "PROD", "SE"]);
  } else if (
    bacType.includes("2ème Année Bac Sciences et Technologies Mécaniques")
  ) {
    enableProgramChoices(programChoices1, ["MCW", "PROD"]);
    enableProgramChoices(programChoices2, ["MCW", "PROD"]);
    enableProgramChoices(programChoices3, ["MCW", "PROD"]);
    enableProgramChoices(programChoices4, ["MCW", "PROD"]);
  } else if (
    bacType.includes("2ème Année Bac Pro Productique Mécanique") ||
    bacType.includes("2ème Année Bac Pro Construction Aeronautique")
  ) {
    enableProgramChoices(programChoices1, ["PROD"]);
    enableProgramChoices(programChoices2, ["PROD"]);
    enableProgramChoices(programChoices3, ["PROD"]);
    enableProgramChoices(programChoices4, ["PROD"]);
  } else if (
    bacType.includes("2ème Année Bac Pro Systèmes Electroniques et Numériques")
  ) {
    enableProgramChoices(programChoices1, ["SE"]);
    enableProgramChoices(programChoices2, ["SE"]);
    enableProgramChoices(programChoices3, ["SE"]);
    enableProgramChoices(programChoices4, ["SE"]);
  } else if (bacType.includes("2ème Année Bac Sciences Agronomiques")) {
    enableProgramChoices(programChoices1, ["MCW", "CG"]);
    enableProgramChoices(programChoices2, ["MCW", "CG"]);
    enableProgramChoices(programChoices3, ["MCW", "CG"]);
    enableProgramChoices(programChoices4, ["MCW", "CG"]);
  } else if (
    bacType.includes("2ème Année Bac Sciences Économiques") ||
    bacType.includes("2ème Année Bac Sciences de Gestion Comptable") ||
    bacType.includes("2ème Année Bac Pro Commerce") ||
    bacType.includes("2ème Année Bac Pro Comptabilité") ||
    bacType.includes("2ème Année Bac Pro Logistique")
  ) {
    enableProgramChoices(programChoices1, ["CG"]);
    enableProgramChoices(programChoices2, ["CG"]);
    enableProgramChoices(programChoices3, ["CG"]);
    enableProgramChoices(programChoices4, ["CG"]);
  }
}

function enableProgramChoices(choices, enabledChoices) {
  for (var i = 0; i < choices.length; i++) {
    var choiceLabel = choices[i].nextElementSibling;
    if (enabledChoices.includes(choices[i].value)) {
      choices[i].disabled = false;
      choiceLabel.style.display = "block";
    } else {
      choices[i].disabled = true;
      choiceLabel.style.display = "none";
    }
  }
}

function disableProgramChoices(choices) {
  for (var i = 0; i < choices.length; i++) {
    choices[i].disabled = true;
    choices[i].nextElementSibling.style.display = "none";
  }
}

document
  .getElementById("bacTypeInput")
  .addEventListener("change", updateProgramChoices);
document
  .getElementById("submitButton")
  .addEventListener("click", updateProgramChoices);