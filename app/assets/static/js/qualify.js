// todo: obfuscate
const demarches = {
  sttropez: {
    piscine:
      "https://www.demarches-simplifiees.fr/commencer/autorisation-provisoire-de-travail",
    cloture:
      "https://www.demarches-simplifiees.fr/commencer/autorisation-provisoire-de-travail"
  },
  // Niort
  niort: {
    piscine:
      "https://www.demarches-simplifiees.fr/commencer/ud069-apt-etudiants-employeur",
    cloture:
      "https://www.demarches-simplifiees.fr/commencer/ud069-apt-etudiants"
  }
};

window.onload = function() {

  function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }

  // set the correct destination based on URL + department parameter
  const btn = document.getElementById("button_redirect_ds");
  const ville = getParameterByName("ville");
  const travaux = getParameterByName("travaux");
  const url = (demarches[ville] || demarches["niort"])[travaux];
  if (btn) {
    btn.href = url;
  }
};
