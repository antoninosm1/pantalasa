const cedulas = document.getElementById("table-cedulas");
const integrantes = document.getElementById("table-integrantes");

document.getElementById('button-cedulas').addEventListener("click", function () { getCedulas(); });
document.getElementById('button-integrantes').addEventListener("click", function () { getIntegrantes(); });
document.getElementById('button-ced-int').addEventListener("click", function () { getCedInt(); });

function getCedulas() {
  let c = "ID\tUsuarioId\tMunicipioNum\tMunicipioNom\tLocalidadNum\tLocalidadNom\tUnidad\tAsistSoc\tTipoLoc\tSedeVm\tSedeVk\tSedePm\tSedePk\tSubsVm\tSubsVk\tSubsPm\tSubsPk\tFecRegCed\tTechoConc\tTechoGalv\tTechoMade\tTechoCart\tTechoOtro\tPareTabiq\tPareAdobe\tPareBlock\tPareMader\tParePiedr\tPareCarto\tPisoCemen\tPisoMader\tPisoTierr\tPisoPiedr\tAgUsoPota\tAgUsoNori\tAgUsoRio\tAgUsoLluv\tAgConPota\tAgConPuri\tAgConHerv\tAgConClor\tAgConFilt\tExcFoSep\tExcLetri\tExcRasSu\tCombGas\tCombCar\tCombLen\tCombOtr\tBasRedM\tBasEnte\tBasCieAb\tBasInci\tAlumRedE\tAlumVela\tAlumQuin\tAlumPlaS\tNumHab\tRecam\tEstan\tComed\tMulti\tCocin\tFecRegViv\tPueIndTara\tPueIndTepe\tPueIndWuar\tPueIndPima\tPueIndMeno\tPueIndOtro\tDerechINSABI\tDerechIMSS\tDerechISSSTE\tDerechPEMEX\tDerechSEDENA\tDerechOtro\tNumPerros\tNumGatos\tNumOtros\tSisSalINSABI\tSisSalIMSS\tSisSalISSSTE\tSisSalPEMEX\tSisSalSEDENA\tSisSalOtro\tSisSalMedPar\tSisSalCliPar\tSisSalParter\tSisSalCurand\tSisSalYerber\tSisSalHueser\tSisSalBotica\tComentario\tFecRegGen\tCaptOrig\n";
  for (let i = 0; i < cedulas.rows.length; i++) {
    for (let j = 0; j < cedulas.rows.item(i).cells.length; j++) {
      c += cedulas.rows.item(i).cells.item(j).innerText + "\t";
    }
    c += "\n";
  }
  let filename = "ced-" + new Date(Date.now()).toISOString().concat(".txt");
  saveNewTextFile(c, filename);
}

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function getIntegrantes() {
  let c = "ID\tCedulaId\tApelli1\tApelli2\tNombres\tFecNac\tEdad\tGenero\tEstOrig\tLenMat\tEstCiv\tParente\tEscola\tOcupa\tIngres\tPapani\tHipert\tDiabet\tTuberc\tAlcoho\tTabaqu\tCancer\tDiu\tOrales\tPreser\tInyMens\tInyBien\tSalping\tImplant\tEmbaraz\tBacamro\tLavDien\tLimVivi\tBebAlco\tTabaco\tMedica\tDrogas\tFecRegInt\n";
  for (let i = 0; i < integrantes.rows.length; i++) {
    for (let j = 0; j < integrantes.rows.item(i).cells.length; j++) {
      j == 6 ? c += getAge(integrantes.rows.item(i).cells.item(5).innerText) + "\t" : c += integrantes.rows.item(i).cells.item(j).innerText + "\t";
    }
    c += "\n";
  }
  let filename = "fam-" + new Date(Date.now()).toISOString().concat(".txt");
  saveNewTextFile(c, filename);
}

function getCedInt() {
  let c = "ID\tUsuarioId\tMunicipioNum\tMunicipioNom\tLocalidadNum\tLocalidadNom\tUnidad\tAsistSoc\tTipoLoc\tSedeVm\tSedeVk\tSedePm\tSedePk\tSubsVm\tSubsVk\tSubsPm\tSubsPk\tFecRegCed\tTechoConc\tTechoGalv\tTechoMade\tTechoCart\tTechoOtro\tPareTabiq\tPareAdobe\tPareBlock\tPareMader\tParePiedr\tPareCarto\tPisoCemen\tPisoMader\tPisoTierr\tPisoPiedr\tAgUsoPota\tAgUsoNori\tAgUsoRio\tAgUsoLluv\tAgConPota\tAgConPuri\tAgConHerv\tAgConClor\tAgConFilt\tExcFoSep\tExcLetri\tExcRasSu\tCombGas\tCombCar\tCombLen\tCombOtr\tBasRedM\tBasEnte\tBasCieAb\tBasInci\tAlumRedE\tAlumVela\tAlumQuin\tAlumPlaS\tNumHab\tRecam\tEstan\tComed\tMulti\tCocin\tFecRegViv\tPueIndTara\tPueIndTepe\tPueIndWuar\tPueIndPima\tPueIndMeno\tPueIndOtro\tDerechINSABI\tDerechIMSS\tDerechISSSTE\tDerechPEMEX\tDerechSEDENA\tDerechOtro\tNumPerros\tNumGatos\tNumOtros\tSisSalINSABI\tSisSalIMSS\tSisSalISSSTE\tSisSalPEMEX\tSisSalSEDENA\tSisSalOtro\tSisSalMedPar\tSisSalCliPar\tSisSalParter\tSisSalCurand\tSisSalYerber\tSisSalHueser\tSisSalBotica\tComentario\tFecRegGen\tCaptOrig\tfamiliaID\tCedulaId\tApelli1\tApelli2\tNombres\tFecNac\tEdad\tGenero\tEstOrig\tLenMat\tEstCiv\tParente\tEscola\tOcupa\tIngres\tPapani\tHipert\tDiabet\tTuberc\tAlcoho\tTabaqu\tCancer\tDiu\tOrales\tPreser\tInyMens\tInyBien\tSalping\tImplant\tEmbaraz\tBacamro\tLavDien\tLimVivi\tBebAlco\tTabaco\tMedica\tDrogas\tFecRegInt\n";
  let cedId = 0;
  for (let i = 0; i < cedulas.rows.length; i++) {
    cedId = cedulas.rows.item(i).cells.item(0).innerText
    for (let j = 0; j < cedulas.rows.item(i).cells.length; j++) {
      c += cedulas.rows.item(i).cells.item(j).innerText + "\t";
    }
    for (let ii = 0; ii < integrantes.rows.length; ii++) {
      if (cedId == integrantes.rows.item(ii).cells.item(1).innerText) {
        for (let jj = 0; jj < integrantes.rows.item(ii).cells.length; jj++) {
          //c += integrantes.rows.item(ii).cells.item(jj).innerText + "\t";
          jj == 6 ? c += getAge(integrantes.rows.item(ii).cells.item(5).innerText) + "\t" : c += integrantes.rows.item(ii).cells.item(jj).innerText + "\t";
        }
        break;
      }
    }
    c += "\n";
  }
  let filename = "ced_int-" + new Date(Date.now()).toISOString().concat(".txt");
  saveNewTextFile(c, filename);
}

function saveNewTextFile(textcontent, name) {
  var blob = new Blob([textcontent], { type: "text/plain;charset=utf-8", });
  saveAs(blob, name);
}