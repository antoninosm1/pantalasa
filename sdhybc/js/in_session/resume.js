const resume_municipios = document.getElementById('resume-municipios');
const resume_localidades = document.getElementById('resume-localidades');

const gene_ced = document.getElementById('resume-gen-ced');
const gene_loc = document.getElementById('resume-gen-loc');
const gene_viv = document.getElementById('resume-gen-viv');
const gene_pob = document.getElementById('resume-gen-pob');

const tech_co = document.getElementById('resume-techo-concreto');
const tech_ga = document.getElementById('resume-techo-galvanizada');
const tech_ma = document.getElementById('resume-techo-madera');
const tech_ca = document.getElementById('resume-techo-carton');
const tech_ot = document.getElementById('resume-techo-otro');
const tech_nd = document.getElementById('resume-techo-nd');

const pare_ta = document.getElementById('resume-pare-tabique');
const pare_ad = document.getElementById('resume-pare-adobe');
const pare_bl = document.getElementById('resume-pare-block');
const pare_ma = document.getElementById('resume-pare-madera');
const pare_pi = document.getElementById('resume-pare-piedra');
const pare_ca = document.getElementById('resume-pare-carton');
const pare_nd = document.getElementById('resume-pare-nd');

const piso_ce = document.getElementById('resume-piso-cemento');
const piso_ma = document.getElementById('resume-piso-madera');
const piso_ti = document.getElementById('resume-piso-tierra');
const piso_pi = document.getElementById('resume-piso-piedra');
const piso_nd = document.getElementById('resume-piso-nd');

const agus_po = document.getElementById('resume-aguauso-potable');
const agus_no = document.getElementById('resume-aguauso-noria');
const agus_ri = document.getElementById('resume-aguauso-rio');
const agus_ll = document.getElementById('resume-aguauso-lluvia');
const agus_nd = document.getElementById('resume-aguauso-nd');

const agco_po = document.getElementById('resume-aguacon-potable');
const agco_pi = document.getElementById('resume-aguacon-purificada');
const agco_he = document.getElementById('resume-aguacon-hervida');
const agco_cl = document.getElementById('resume-aguacon-clorada');
const agco_fi = document.getElementById('resume-aguacon-filtrada');
const agco_nd = document.getElementById('resume-aguacon-nd');

const excr_fo = document.getElementById('resume-exc-fosa');
const excr_le = document.getElementById('resume-exc-letrina');
const excr_ra = document.getElementById('resume-exc-ras');
const excr_nd = document.getElementById('resume-exc-nd');

const comb_ga = document.getElementById('resume-com-gas');
const comb_ca = document.getElementById('resume-com-carbon');
const comb_le = document.getElementById('resume-com-lena');
const comb_ot = document.getElementById('resume-com-otros');
const comb_nd = document.getElementById('resume-com-nd');

const basu_re = document.getElementById('resume-bas-redmun');
const basu_en = document.getElementById('resume-bas-enterramiento');
const basu_ci = document.getElementById('resume-bas-cielo');
const basu_in = document.getElementById('resume-bas-incineración');
const basu_nd = document.getElementById('resume-bas-nd');

const alum_el = document.getElementById('resume-alu-electrica');
const alum_ve = document.getElementById('resume-alu-velas');
const alum_qu = document.getElementById('resume-alu-quinque');
const alum_pl = document.getElementById('resume-alu-placa');
const alum_nd = document.getElementById('resume-alu-nd');

const divi_nu = document.getElementById('resume-disthab-numhab');
const divi_re = document.getElementById('resume-disthab-recama');
const divi_es = document.getElementById('resume-disthab-estanc');
const divi_co = document.getElementById('resume-disthab-comedo');
const divi_mu = document.getElementById('resume-disthab-multip');
const divi_ci = document.getElementById('resume-disthab-cocind');

const havi_1 = document.getElementById('resume-habpviv-viv1hab');
const havi_2 = document.getElementById('resume-habpviv-viv2hab');
const havi_3 = document.getElementById('resume-habpviv-viv3hab');
const havi_4 = document.getElementById('resume-habpviv-viv4hab');
const havi_n = document.getElementById('resume-habpviv-nd');

resume_municipios.addEventListener('change', function() {
    getData(resume_municipios.value);
});

function getData(getFrom) {
    const formData = new FormData();
    formData.append('from', getFrom);
    fetch('https://www.sdhybc.org/controller/home/resume.php', {
    // fetch('http://sdhybc/controller/home/resume.php', {
        body: formData,
        method: 'post'
    })
    .then(response => response.json())
    .then(data => putRecords(data))
    .error(error => openModalOk("ERROR", error, 5000));
}

function putRecords(data) {
    let i;
    for (i = resume_localidades.length - 1; i >= 0; i--) {
        resume_localidades.remove(i);
    }
    i = 0;
    while (i < data['localidades'].length) {
        var opt = document.createElement('option');
        opt.value = data['localidades'][i]['LocalidadNom'];
        opt.innerText = data['localidades'][i]['LocalidadNum'] + "-" + data['localidades'][i]['LocalidadNom'];
        resume_localidades.appendChild(opt);
        i++;
    }
    
    gene_ced.innerText = data['cedulas'];
    gene_loc.innerText = data['cantidad_localidades'];
    gene_viv.innerText = data['viviendas'];
    gene_pob.innerText = data['poblacion'];
    
    tech_co.innerText = data['techo_conc'];
    tech_ga.innerText = data['techo_galv'];
    tech_ma.innerText = data['techo_made'];
    tech_ca.innerText = data['techo_cart'];
    tech_ot.innerText = data['techo_otro'];
    tech_nd.innerText = data['techo_nd'];
    
    pare_ta.innerText = data['pared_tabi'];
    pare_ad.innerText = data['pared_adob'];
    pare_bl.innerText = data['pared_bloc'];
    pare_ma.innerText = data['pared_made'];
    pare_pi.innerText = data['pared_pied'];
    pare_ca.innerText = data['pared_cart'];
    pare_nd.innerText = data['pared_nd'];
    
    piso_ce.innerText = data['piso_ceme'];
    piso_ma.innerText = data['piso_made'];
    piso_ti.innerText = data['piso_tier'];
    piso_pi.innerText = data['piso_pied'];
    piso_nd.innerText = data['piso_nd'];
    
    agus_po.innerText = data['agus_pot'];
    agus_no.innerText = data['agus_nor'];
    agus_ri.innerText = data['agus_rio'];
    agus_ll.innerText = data['agus_llu'];
    agus_nd.innerText = data['agus_nd'];
    
    agco_po.innerText = data['agco_pot'];
    agco_pi.innerText = data['agco_pur'];
    agco_he.innerText = data['agco_her'];
    agco_cl.innerText = data['agco_clo'];
    agco_fi.innerText = data['agco_fil'];
    agco_nd.innerText = data['agco_nd'];
    
    excr_fo.innerText = data['exc_fo'];
    excr_le.innerText = data['exc_le'];
    excr_ra.innerText = data['exc_ra'];
    excr_nd.innerText = data['exc_nd'];
    
    comb_ga.innerText = data['comb_ga'];
    comb_ca.innerText = data['comb_ca'];
    comb_le.innerText = data['comb_le'];
    comb_ot.innerText = data['comb_ot'];
    comb_nd.innerText = data['comb_nd'];
    
    basu_re.innerText = data['bas_re'];
    basu_en.innerText = data['bas_en'];
    basu_ci.innerText = data['bas_ci'];
    basu_in.innerText = data['bas_in'];
    basu_nd.innerText = data['bas_nd'];
    
    alum_el.innerText = data['alu_re'];
    alum_ve.innerText = data['alu_ve'];
    alum_qu.innerText = data['alu_qu'];
    alum_pl.innerText = data['alu_pl'];
    alum_nd.innerText = data['alu_nd'];
    
    divi_nu.innerText = data['dh_numhab'];
    divi_re.innerText = data['dh_rec'];
    divi_es.innerText = data['dh_est'];
    divi_co.innerText = data['dh_com'];
    divi_mu.innerText = data['dh_mul'];
    divi_ci.innerText = data['dh_coc'];
    
    havi_1.innerText = data['habviv_1'];
    havi_2.innerText = data['habviv_2'];
    havi_3.innerText = data['habviv_3'];
    havi_4.innerText = data['habviv_4'];
    havi_n.innerText = data['habviv_nd'];
    
    document.getElementById('resume-pueind-tarahumara').innerText = data['pueind_tara'];
    document.getElementById('resume-pueind-tepehuan').innerText = data['pueind_tepe'];
    document.getElementById('resume-pueind-wuarojio').innerText = data['pueind_wuar'];
    document.getElementById('resume-pueind-pima').innerText = data['pueind_pima'];
    document.getElementById('resume-pueind-menonita').innerText = data['pueind_meno'];
    document.getElementById('resume-pueind-otro').innerText = data['pueind_otro'];
    document.getElementById('resume-pueind-nd').innerText = data['pueind_nd'];
    
    document.getElementById('resume-dere-INSABI').innerText = data['dere_INSABI'];
    document.getElementById('resume-dere-IMSS').innerText = data['dere_IMSS'];
    document.getElementById('resume-dere-ISSSTE').innerText = data['dere_ISSSTE'];
    document.getElementById('resume-dere-PEMEX').innerText = data['dere_PEMEX'];
    document.getElementById('resume-dere-SEDENA').innerText = data['dere_SEDENA'];
    document.getElementById('resume-dere-otro').innerText = data['dere_Otro'];
    document.getElementById('resume-dere-nd').innerText = data['dere_nd'];
    
    document.getElementById('resume-masc-perros').innerText = data['masc_pe'];
    document.getElementById('resume-masc-gatos').innerText = data['masc_ga'];
    document.getElementById('resume-masc-otros').innerText = data['masc_ot'];
    
    document.getElementById('resume-result-INSABI').innerText = data['sisa_INSABI'];
    document.getElementById('resume-servsal-IMSS').innerText = data['sisa_IMSS'];
    document.getElementById('resume-servsal-ISSSTE').innerText = data['sisa_ISSSTE'];
    document.getElementById('resume-servsal-PEMEX').innerText = data['sisa_PEMEX'];
    document.getElementById('resume-servsal-SEDENA').innerText = data['sisa_SEDENA'];
    document.getElementById('resume-servsal-Otro').innerText = data['sisa_Otro'];
    document.getElementById('resume-servsal-Medico').innerText = data['sisa_Medico'];
    document.getElementById('resume-servsal-Clinica').innerText = data['sisa_Clinica'];
    document.getElementById('resume-servsal-Partera').innerText = data['sisa_Partera'];
    document.getElementById('resume-servsal-Curandera').innerText = data['sisa_Curandera'];
    document.getElementById('resume-servsal-Yerbero').innerText = data['sisa_Yerbero'];
    document.getElementById('resume-servsal-Huesero').innerText = data['sisa_Huesero'];
    document.getElementById('resume-servsal-Boticario').innerText = data['sisa_Boticario'];
    document.getElementById('resume-servsal-nd').innerText = data['sisa_nd'];
    
    document.getElementById('resume-edahom-5').innerText = data['edho_4'];
    document.getElementById('resume-edahom-5-9').innerText = data['edho_59'];
    document.getElementById('resume-edahom-10-17').innerText = data['edho_1017'];
    document.getElementById('resume-edahom-18-59').innerText = data['edho_1859'];
    document.getElementById('resume-edahom-60').innerText = data['edho_60'];
    document.getElementById('resume-edahom-nd').innerText = data['edho_nd'];
    
    document.getElementById('resume-edamuj-5').innerText = data['edmu_4'];
    document.getElementById('resume-edamuj-5-9').innerText = data['edmu_59'];
    document.getElementById('resume-edamuj-10-17').innerText = data['edmu_1017'];
    document.getElementById('resume-edamuj-18-59').innerText = data['edmu_1859'];
    document.getElementById('resume-edamuj-60').innerText = data['edmu_60'];
    document.getElementById('resume-edamuj-nd').innerText = data['edmu_nd'];
    
    document.getElementById('resume-lenmat-espa').innerText = data['lenmat_espa'];
    document.getElementById('resume-lenmat-tara').innerText = data['lenmat_tara'];
    document.getElementById('resume-lenmat-tepe').innerText = data['lenmat_tepe'];
    document.getElementById('resume-lenmat-wuar').innerText = data['lenmat_wuar'];
    document.getElementById('resume-lenmat-pima').innerText = data['lenmat_pima'];
    document.getElementById('resume-lenmat-meno').innerText = data['lenmat_meno'];
    document.getElementById('resume-lenmat-otro').innerText = data['lenmat_otro'];
    document.getElementById('resume-lenmat-nd').innerText = data['lenmat_nd'];
    
    document.getElementById('resume-sexo-hombre').innerText = data['sexo_ho'];
    document.getElementById('resume-sexo-mujer').innerText = data['sexo_mu'];
    document.getElementById('resume-sexo-nd').innerText = data['sexo_nd'];
    
    document.getElementById('resume-estciv-cas').innerText = data['estciv_cas'];
    document.getElementById('resume-estciv-sol').innerText = data['estciv_sol'];
    document.getElementById('resume-estciv-uni').innerText = data['estciv_uni'];
    document.getElementById('resume-estciv-div').innerText = data['estciv_div'];
    document.getElementById('resume-estciv-viu').innerText = data['estciv_viu'];
    document.getElementById('resume-estciv-sep').innerText = data['estciv_sep'];
    document.getElementById('resume-estciv-nd').innerText = data['estciv_nd'];
    
    document.getElementById('resume-paren-pad').innerText = data['pare_pad'];
    document.getElementById('resume-paren-mad').innerText = data['pare_mad'];
    document.getElementById('resume-paren-hij').innerText = data['pare_hij'];
    document.getElementById('resume-paren-par').innerText = data['pare_par'];
    document.getElementById('resume-paren-otr').innerText = data['pare_otr'];
    document.getElementById('resume-paren-nd').innerText = data['pare_nd'];
    
    document.getElementById('resume-esc-prees').innerText = data['esco_pree'];
    document.getElementById('resume-esc-prima').innerText = data['esco_prim'];
    document.getElementById('resume-esc-secun').innerText = data['esco_secu'];
    document.getElementById('resume-esc-prepa').innerText = data['esco_prep'];
    document.getElementById('resume-esc-tecni').innerText = data['esco_tecn'];
    document.getElementById('resume-esc-profe').innerText = data['esco_prof'];
    document.getElementById('resume-esc-posgr').innerText = data['esco_posg'];
    document.getElementById('resume-esc-noasi').innerText = data['esco_noas'];
    document.getElementById('resume-esc-sabel').innerText = data['esco_sale'];
    document.getElementById('resume-esc-analf').innerText = data['esco_anal'];
    document.getElementById('resume-esc-nd').innerText = data['esco_nd'];
    
    document.getElementById('resume-ocupa-hog').innerText = data['ocu_hog'];
    document.getElementById('resume-ocupa-est').innerText = data['ocu_est'];
    document.getElementById('resume-ocupa-emp').innerText = data['ocu_emp'];
    document.getElementById('resume-ocupa-des').innerText = data['ocu_des'];
    document.getElementById('resume-ocupa-cue').innerText = data['ocu_por'];
    document.getElementById('resume-ocupa-nd').innerText = data['ocu_nd'];
    
    document.getElementById('resume-ingre-men').innerText = data['ingre_menor'];
    document.getElementById('resume-ingre-igu').innerText = data['ingre_igual'];
    document.getElementById('resume-ingre-may').innerText = data['ingre_mayor'];
    document.getElementById('resume-ingre-nd').innerText = data['ingre_nd'];
    
    document.getElementById('resume-det-papanicolaou').innerText = data['det_pap'];
    document.getElementById('resume-det-hipertensión').innerText = data['det_hip'];
    document.getElementById('resume-det-diabetes').innerText = data['det_dia'];
    document.getElementById('resume-det-tuberculosis').innerText = data['det_tub'];
    document.getElementById('resume-det-alcoholismo').innerText = data['det_alc'];
    document.getElementById('resume-det-tabaquismo').innerText = data['det_tab'];
    document.getElementById('resume-det-cancer').innerText = data['det_can'];
    
    document.getElementById('resume-plafam-diu').innerText = data['plan_diu'];
    document.getElementById('resume-plafam-ora').innerText = data['plan_ora'];
    document.getElementById('resume-plafam-pre').innerText = data['plan_pre'];
    document.getElementById('resume-plafam-inm').innerText = data['plan_inm'];
    document.getElementById('resume-plafam-inb').innerText = data['plan_inb'];
    document.getElementById('resume-plafam-sal').innerText = data['plan_sal'];
    document.getElementById('resume-plafam-imp').innerText = data['plan_imp'];
    
    document.getElementById('resume-emba-si').innerText = data['emb_si'];
    document.getElementById('resume-emba-ec').innerText = data['emb_ec'];
    
    document.getElementById('resume-bcr-di').innerText = data['bcr_di'];
    document.getElementById('resume-bcr-tr').innerText = data['bcr_tr'];
    document.getElementById('resume-bcr-do').innerText = data['bcr_do'];
    document.getElementById('resume-bcr-nu').innerText = data['bcr_nu'];
    document.getElementById('resume-bcr-nd').innerText = data['bcr_nd'];
    
    document.getElementById('resume-ld-di').innerText = data['ld_di'];
    document.getElementById('resume-ld-tr').innerText = data['ld_tr'];
    document.getElementById('resume-ld-do').innerText = data['ld_do'];
    document.getElementById('resume-ld-nu').innerText = data['ld_nu'];
    document.getElementById('resume-ld-nd').innerText = data['ld_nd'];
    
    document.getElementById('resume-lv-di').innerText = data['lv_di'];
    document.getElementById('resume-lv-tr').innerText = data['lv_tr'];
    document.getElementById('resume-lv-do').innerText = data['lv_do'];
    document.getElementById('resume-lv-nu').innerText = data['lv_nu'];
    document.getElementById('resume-lv-nd').innerText = data['lv_nd'];
    
    document.getElementById('resume-cba-di').innerText = data['ba_di'];
    document.getElementById('resume-cba-tr').innerText = data['ba_tr'];
    document.getElementById('resume-cba-do').innerText = data['ba_do'];
    document.getElementById('resume-cba-nu').innerText = data['ba_nu'];
    document.getElementById('resume-cba-nd').innerText = data['ba_nd'];
    
    document.getElementById('resume-tab-di').innerText = data['ta_di'];
    document.getElementById('resume-tab-tr').innerText = data['ta_tr'];
    document.getElementById('resume-tab-do').innerText = data['ta_do'];
    document.getElementById('resume-tab-nu').innerText = data['ta_nu'];
    document.getElementById('resume-tab-nd').innerText = data['ta_nd'];
    
    document.getElementById('resume-med-di').innerText = data['med_di'];
    document.getElementById('resume-med-tr').innerText = data['med_tr'];
    document.getElementById('resume-med-do').innerText = data['med_do'];
    document.getElementById('resume-med-nu').innerText = data['med_nu'];
    document.getElementById('resume-med-nd').innerText = data['med_nd'];
    
    document.getElementById('resume-dro-di').innerText = data['dro_di'];
    document.getElementById('resume-dro-tr').innerText = data['dro_tr'];
    document.getElementById('resume-dro-do').innerText = data['dro_do'];
    document.getElementById('resume-dro-nu').innerText = data['dro_nu'];
    document.getElementById('resume-dro-nd').innerText = data['dro_nd'];
}

function openModalOk(a, b, c) {
    alert('err');
}

function openNewWindow(att){
    let url = "https://www.sdhybc.org/showrecords.php?mun=" + resume_municipios.value + att;
    // let url = "http://sdhybc/showrecords.php?mun=" + resume_municipios.value + att;
    window.open(url, "_blank");
}

// gene_ced.addEventListener('click', function() { openNewWindow("&num=" + gene_ced.innerText + "&name=(GLOBAL)"); });

// tech_co.addEventListener('click', function() { openNewWindow("&att=cedula.TechoConc=1&num=" + tech_co.innerText + "&name=Techo: Concreto"); });
// tech_ga.addEventListener('click', function() { openNewWindow("&att=cedula.TechoGalv=1&num=" + tech_ga.innerText + "&name=Techo: Lamina Galvanizada"); });
// tech_ma.addEventListener('click', function() { openNewWindow("&att=cedula.TechoMade=1&num=" + tech_ma.innerText + "&name=Techo: Madera"); });
// tech_ca.addEventListener('click', function() { openNewWindow("&att=cedula.TechoCart=1&num=" + tech_ca.innerText + "&name=Techo: Carton"); });
// tech_ot.addEventListener('click', function() { openNewWindow("&att=cedula.TechoOtro=1&num=" + tech_ot.innerText + "&name=Techo: Otro"); });
// tech_nd.addEventListener('click', function() { openNewWindow("&att=cedula.TechoConc=0%20AND%20cedula.TechoGalv=0%20AND%20cedula.TechoMade=0%20AND%20cedula.TechoCart=0%20AND%20cedula.TechoOtro=0&num=" + tech_nd.innerText + "&name=Techo: No Disponible"); });

// pare_ta.addEventListener('click', function() { openNewWindow("&att=cedula.PareTabiq=1&num=" + pare_ta.innerText + "&name=Pared: Tabique"); });
// pare_ad.addEventListener('click', function() { openNewWindow("&att=cedula.PareAdobe=1&num=" + pare_ad.innerText + "&name=Pared: Adobe"); });
// pare_bl.addEventListener('click', function() { openNewWindow("&att=cedula.PareBlock=1&num=" + pare_bl.innerText + "&name=Pared: Block"); });
// pare_ma.addEventListener('click', function() { openNewWindow("&att=cedula.PareMader=1&num=" + pare_ma.innerText + "&name=Pared: Madera"); });
// pare_pi.addEventListener('click', function() { openNewWindow("&att=cedula.ParePiedr=1&num=" + pare_pi.innerText + "&name=Pared: Piedra"); });
// pare_ca.addEventListener('click', function() { openNewWindow("&att=cedula.PareCarto=1&num=" + pare_ca.innerText + "&name=Pared: Cartón"); });
// pare_nd.addEventListener('click', function() { openNewWindow("&att=cedula.PareTabiq=0%20AND%20cedula.PareAdobe=0%20AND%20cedula.PareBlock=0%20AND%20cedula.PareMader=0%20AND%20cedula.ParePiedr=0%20AND%20cedula.PareCarto=0&num=" + pare_nd.innerText + "&name=Pared: No Disponible"); });

// piso_ce.addEventListener('click', function() { openNewWindow("&att=cedula.PisoCemen=1&num=" + piso_ce.innerText + "&name=Piso: Cemento"); });
// piso_ma.addEventListener('click', function() { openNewWindow("&att=cedula.PisoMader=1&num=" + piso_ma.innerText + "&name=Piso: Madera"); });
// piso_ti.addEventListener('click', function() { openNewWindow("&att=cedula.PisoTierr=1&num=" + piso_ti.innerText + "&name=Piso: Tierra"); });
// piso_pi.addEventListener('click', function() { openNewWindow("&att=cedula.PisoPiedr=1&num=" + piso_pi.innerText + "&name=Piso: Piedra"); });
// piso_nd.addEventListener('click', function() { openNewWindow("&att=cedula.PisoCemen=0%20AND%20cedula.PisoMader=0%20AND%20cedula.PisoTierr=0%20AND%20cedula.PisoPiedr=0&num=" + piso_nd.innerText + "&name=Piso: No Disponible"); });

// agus_po.addEventListener('click', function() { openNewWindow("&att=cedula.AgUsoPota=1&num=" + agus_po.innerText + "&name=Agua de Uso: Potable"); });
// agus_no.addEventListener('click', function() { openNewWindow("&att=cedula.AgUsoNori=1&num=" + agus_no.innerText + "&name=Agua de Uso: Noria"); });
// agus_ri.addEventListener('click', function() { openNewWindow("&att=cedula.AgUsoRio=1&num=" + agus_ri.innerText + "&name=Agua de Uso: Rio"); });
// agus_ll.addEventListener('click', function() { openNewWindow("&att=cedula.AgUsoLluv=1&num=" + agus_ll.innerText + "&name=Agua de Uso: Lluvia"); });
// agus_nd.addEventListener('click', function() { openNewWindow("&att=cedula.AgUsoPota=0%20AND%20cedula.AgUsoNori=0%20AND%20cedula.AgUsoRio=0%20AND%20cedula.AgUsoLluv=0&num=" + agus_nd.innerText + "&name=Agua de Uso: No Disponible"); });

// agco_po.addEventListener('click', function() { openNewWindow("&att=cedula.AgConPota=1&num=" + agco_po.innerText + "&name=Agua de Consumo: Potable"); });
// agco_pi.addEventListener('click', function() { openNewWindow("&att=cedula.AgConPuri=1&num=" + agco_pi.innerText + "&name=Agua de Consumo: Purificada"); });
// agco_he.addEventListener('click', function() { openNewWindow("&att=cedula.AgConHerv=1&num=" + agco_he.innerText + "&name=Agua de Consumo: Hervida"); });
// agco_cl.addEventListener('click', function() { openNewWindow("&att=cedula.AgConClor=1&num=" + agco_cl.innerText + "&name=Agua de Consumo: Clorada"); });
// agco_fi.addEventListener('click', function() { openNewWindow("&att=cedula.AgConFilt=1&num=" + agco_fi.innerText + "&name=Agua de Consumo: Filtrada"); });
// agco_nd.addEventListener('click', function() { openNewWindow("&att=cedula.AgConPota=0%20AND%20cedula.AgConPuri=0%20AND%20cedula.AgConHerv=0%20AND%20cedula.AgConClor=0%20AND%20cedula.AgConFilt=0&num=" + agco_nd.innerText + "&name=Agua de Consumo: No Disponible"); });

// excr_fo.addEventListener('click', function() { openNewWindow("&att=cedula.ExcFoSep=1&num=" + excr_fo.innerText + "&name=Excreta: Fosa Séptica"); });
// excr_le.addEventListener('click', function() { openNewWindow("&att=cedula.ExcLetri=1&num=" + excr_le.innerText + "&name=Excreta: Letrina"); });
// excr_ra.addEventListener('click', function() { openNewWindow("&att=cedula.ExcRasSu=1&num=" + excr_ra.innerText + "&name=Excreta: Al Ras del Suelo"); });
// excr_nd.addEventListener('click', function() { openNewWindow("&att=cedula.ExcFoSep=0%20AND%20cedula.ExcLetri=0%20AND%20cedula.ExcRasSu=0&num=" + excr_nd.innerText + "&name=Excreta: No Disponible"); });

// comb_ga.addEventListener('click', function() { openNewWindow("&att=cedula.CombGas=1&num=" + comb_ga.innerText + "&name=Combustible: Gas"); });
// comb_ca.addEventListener('click', function() { openNewWindow("&att=cedula.CombCar=1&num=" + comb_ca.innerText + "&name=Combustible: Carbón"); });
// comb_le.addEventListener('click', function() { openNewWindow("&att=cedula.CombLen=1&num=" + comb_le.innerText + "&name=Combustible: Leña"); });
// comb_ot.addEventListener('click', function() { openNewWindow("&att=cedula.CombOtr=1&num=" + comb_ot.innerText + "&name=Combustible: Otro"); });
// comb_nd.addEventListener('click', function() { openNewWindow("&att=cedula.CombGas=0%20AND%20cedula.CombCar=0%20AND%20cedula.CombLen=0%20AND%20cedula.CombOtr=0&num=" + comb_nd.innerText + "&name=Combustible: No Disponible"); });

// basu_re.addEventListener('click', function() { openNewWindow("&att=cedula.BasRedM=1&num=" + basu_re.innerText + "&name=Basura: Red Municipal"); });
// basu_en.addEventListener('click', function() { openNewWindow("&att=cedula.BasEnte=1&num=" + basu_en.innerText + "&name=Basura: Enterramiento"); });
// basu_ci.addEventListener('click', function() { openNewWindow("&att=cedula.BasCieAb=1&num=" + basu_ci.innerText + "&name=Basura: Cielo Abierto"); });
// basu_in.addEventListener('click', function() { openNewWindow("&att=cedula.BasInci=1&num=" + basu_in.innerText + "&name=Basura: Incineración"); });
// basu_nd.addEventListener('click', function() { openNewWindow("&att=cedula.BasRedM=0%20AND%20cedula.BasEnte=0%20AND%20cedula.BasCieAb=0%20AND%20cedula.BasInci=0&num=" + basu_nd.innerText + "&name=Basura: No Disponible"); });

// alum_el.addEventListener('click', function() { openNewWindow("&att=cedula.AlumRedE=1&num=" + alum_el.innerText + "&name=Alumbrado: Red Eléctrica"); });
// alum_ve.addEventListener('click', function() { openNewWindow("&att=cedula.AlumVela=1&num=" + alum_ve.innerText + "&name=Alumbrado: Vela"); });
// alum_qu.addEventListener('click', function() { openNewWindow("&att=cedula.AlumQuin=1&num=" + alum_qu.innerText + "&name=Alumbrado: Quinque"); });
// alum_pl.addEventListener('click', function() { openNewWindow("&att=cedula.AlumPlaS=1&num=" + alum_pl.innerText + "&name=Alumbrado: Placa Solar"); });
// alum_nd.addEventListener('click', function() { openNewWindow("&att=cedula.AlumRedE=0%20AND%20cedula.AlumVela=0%20AND%20cedula.AlumQuin=0%20AND%20cedula.AlumPlaS=0&num=" + alum_nd.innerText + "&name=Alumbrado: No Disponible"); });

// divi_nu.addEventListener('click', function() { openNewWindow("&att=cedula.NumHab>-1&num=" + gene_ced.innerText + "&name=Vivienda: " + divi_nu.innerText + " habitaciones"); });
// divi_re.addEventListener('click', function() { openNewWindow("&att=cedula.Recam=1&num=" + divi_re.innerText + "&name=Vivienda: Recamara"); });
// divi_es.addEventListener('click', function() { openNewWindow("&att=cedula.Estan=1&num=" + divi_es.innerText + "&name=Vivienda: Estancia"); });
// divi_co.addEventListener('click', function() { openNewWindow("&att=cedula.Comed=1&num=" + divi_co.innerText + "&name=Vivienda: Comedor"); });
// divi_mu.addEventListener('click', function() { openNewWindow("&att=cedula.Multi=1&num=" + divi_mu.innerText + "&name=Vivienda: Multiple"); });
// divi_ci.addEventListener('click', function() { openNewWindow("&att=cedula.Cocin=1&num=" + divi_ci.innerText + "&name=Vivienda: Cocina Independiente"); });

// havi_1.addEventListener('click', function() { openNewWindow("&att=cedula.NumHab=1&num=" + havi_1.innerText + "&name=Habitaciones por Vivienda: 1"); });
// havi_2.addEventListener('click', function() { openNewWindow("&att=cedula.NumHab=2&num=" + havi_2.innerText + "&name=Habitaciones por Vivienda: 2"); });
// havi_3.addEventListener('click', function() { openNewWindow("&att=cedula.NumHab=3&num=" + havi_3.innerText + "&name=Habitaciones por Vivienda: 3"); });
// havi_4.addEventListener('click', function() { openNewWindow("&att=cedula.NumHab>=4&num=" + havi_4.innerText + "&name=Habitaciones por Vivienda: 4 ó más"); });
// havi_n.addEventListener('click', function() { openNewWindow("&att=cedula.NumHab=0%20OR%20cedula.NumHab=NULL&num=" + havi_n.innerText + "&name=Habitaciones por Vivienda: No Disponible"); });



// Modals
const modal_dd = document.getElementById("modal-dd");
const modal_dd_title = document.getElementById("modal-dd-title");
const modal_dd_description = document.getElementById("modal-dd-description");


function downloadData(c){
    let url = "https://www.sdhybc.org/controller/home/get_records.php?from=" + resume_municipios.value + "&type=" + c + "&data=" + modal_dd_description.innerHTML;
    // let url = "http://sdhybc/controller/home/get_records.php?from=" + resume_municipios.value + "&type=" + c + "&data=" + modal_dd_description.innerHTML;
    window.open(url, "_blank");
}

function getCedulas(){
    downloadData("Ced");
}
function getIntegrantes(){
    downloadData("Int");
}
function getCedInt(){
    downloadData("Cid");
}
function getTodo(){
    downloadData("All");
}

document.getElementById("modal-dd-button-ced").addEventListener('click', function() { getCedulas(); });
document.getElementById("modal-dd-button-int").addEventListener('click', function() { getIntegrantes(); });
document.getElementById("modal-dd-button-cid").addEventListener('click', function() { getCedInt(); });
document.getElementById("modal-dd-button-cancel").addEventListener('click', function() { closeModalDd(); });

function openModalDd(description) {
    modal_dd_title.innerHTML = "OBTENER DATOS";
    modal_dd_description.innerHTML = description;
    modal_dd.showModal();
}

function closeModalDd() {
    modal_dd.close();
}

gene_ced.addEventListener('click', function() { openModalDd("gen_ced"); });
tech_co.addEventListener('click', function() { openModalDd("TechoConc"); });
tech_ga.addEventListener('click', function() { openModalDd("TechoGalv"); });
tech_ma.addEventListener('click', function() { openModalDd("TechoMade"); });
tech_ca.addEventListener('click', function() { openModalDd("TechoCart"); });
tech_ot.addEventListener('click', function() { openModalDd("TechoOtro"); });
tech_nd.addEventListener('click', function() { openModalDd("Techo"); });
pare_ta.addEventListener('click', function() { openModalDd("PareTabiq"); });
pare_ad.addEventListener('click', function() { openModalDd("PareAdobe"); });
pare_bl.addEventListener('click', function() { openModalDd("PareBlock"); });
pare_ma.addEventListener('click', function() { openModalDd("PareMader"); });
pare_pi.addEventListener('click', function() { openModalDd("ParePiedr"); });
pare_ca.addEventListener('click', function() { openModalDd("PareCarto"); });
pare_nd.addEventListener('click', function() { openModalDd("Pare"); });
piso_ce.addEventListener('click', function() { openModalDd("PisoCemen"); });
piso_ma.addEventListener('click', function() { openModalDd("PisoMader"); });
piso_ti.addEventListener('click', function() { openModalDd("PisoTierr"); });
piso_pi.addEventListener('click', function() { openModalDd("PisoPiedr"); });
piso_nd.addEventListener('click', function() { openModalDd("Piso"); });
agus_po.addEventListener('click', function() { openModalDd("AgUsoPota"); });
agus_no.addEventListener('click', function() { openModalDd("AgUsoNori"); });
agus_ri.addEventListener('click', function() { openModalDd("AgUsoRio"); });
agus_ll.addEventListener('click', function() { openModalDd("AgUsoLluv"); });
agus_nd.addEventListener('click', function() { openModalDd("AgUso"); });
agco_po.addEventListener('click', function() { openModalDd("AgConPota"); });
agco_pi.addEventListener('click', function() { openModalDd("AgConPuri"); });
agco_he.addEventListener('click', function() { openModalDd("AgConHerv"); });
agco_cl.addEventListener('click', function() { openModalDd("AgConClor"); });
agco_fi.addEventListener('click', function() { openModalDd("AgConFilt"); });
agco_nd.addEventListener('click', function() { openModalDd("AgCon"); });
excr_fo.addEventListener('click', function() { openModalDd("ExcFoSep"); });
excr_le.addEventListener('click', function() { openModalDd("ExcLetri"); });
excr_ra.addEventListener('click', function() { openModalDd("ExcRasSu"); });
excr_nd.addEventListener('click', function() { openModalDd("Exc"); });
comb_ga.addEventListener('click', function() { openModalDd("CombGas"); });
comb_ca.addEventListener('click', function() { openModalDd("CombCar"); });
comb_le.addEventListener('click', function() { openModalDd("CombLen"); });
comb_ot.addEventListener('click', function() { openModalDd("CombOtr"); });
comb_nd.addEventListener('click', function() { openModalDd("Comb"); });
basu_re.addEventListener('click', function() { openModalDd("BasRedM"); });
basu_en.addEventListener('click', function() { openModalDd("BasEnte"); });
basu_ci.addEventListener('click', function() { openModalDd("BasCieAb"); });
basu_in.addEventListener('click', function() { openModalDd("BasInci"); });
basu_nd.addEventListener('click', function() { openModalDd("Bas"); });
alum_el.addEventListener('click', function() { openModalDd("AlumRedE"); });
alum_ve.addEventListener('click', function() { openModalDd("AlumVela"); });
alum_qu.addEventListener('click', function() { openModalDd("AlumQuin"); });
alum_pl.addEventListener('click', function() { openModalDd("AlumPlaS"); });
alum_nd.addEventListener('click', function() { openModalDd("Alum"); });
divi_nu.addEventListener('click', function() { openModalDd("NumHab"); });
divi_re.addEventListener('click', function() { openModalDd("Recam"); });
divi_es.addEventListener('click', function() { openModalDd("Estan"); });
divi_co.addEventListener('click', function() { openModalDd("Comed"); });
divi_mu.addEventListener('click', function() { openModalDd("Multi"); });
divi_ci.addEventListener('click', function() { openModalDd("Cocin"); });
havi_1.addEventListener('click', function() { openModalDd("Hab1"); });
havi_2.addEventListener('click', function() { openModalDd("Hab2"); });
havi_3.addEventListener('click', function() { openModalDd("Hab3"); });
havi_4.addEventListener('click', function() { openModalDd("Hab4"); });
havi_n.addEventListener('click', function() { openModalDd("HabN"); });


getData("ALL");