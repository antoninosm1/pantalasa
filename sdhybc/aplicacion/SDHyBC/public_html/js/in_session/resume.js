const resume_municipios = document.getElementById('resume-municipios');
const resume_localidades = document.getElementById('resume-localidades');

resume_municipios.addEventListener('change', function() {
    getData(resume_municipios.value);
});

function getData(getFrom) {
    const formData = new FormData();
    formData.append('from', getFrom);
    fetch('https://www.sdhybc.org/controller/home/resume.php', {
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
        //if (data['localidades'][i]['LocalidadNom'] != '') {
            var opt = document.createElement('option');
            opt.value = data['localidades'][i]['LocalidadNom'];
            opt.innerText = data['localidades'][i]['LocalidadNum'] + "-" + data['localidades'][i]['LocalidadNom'];
            resume_localidades.appendChild(opt);
        //}
        i++;
    }
    
    document.getElementById('resume-gen-ced').innerText = data['cedulas'];
    document.getElementById('resume-gen-loc').innerText = data['cantidad_localidades'];
    document.getElementById('resume-gen-viv').innerText = data['viviendas'];
    document.getElementById('resume-gen-pob').innerText = data['poblacion'];
    
    document.getElementById('resume-techo-concreto').innerText = data['techo_conc'];
    document.getElementById('resume-techo-galvanizada').innerText = data['techo_galv'];
    document.getElementById('resume-techo-madera').innerText = data['techo_made'];
    document.getElementById('resume-techo-carton').innerText = data['techo_cart'];
    document.getElementById('resume-techo-otro').innerText = data['techo_otro'];
    document.getElementById('resume-techo-nd').innerText = data['techo_nd'];
    
    document.getElementById('resume-pare-tabique').innerText = data['pared_tabi'];
    document.getElementById('resume-pare-adobe').innerText = data['pared_adob'];
    document.getElementById('resume-pare-block').innerText = data['pared_bloc'];
    document.getElementById('resume-pare-madera').innerText = data['pared_made'];
    document.getElementById('resume-pare-piedra').innerText = data['pared_pied'];
    document.getElementById('resume-pare-carton').innerText = data['pared_cart'];
    document.getElementById('resume-pare-nd').innerText = data['pared_nd'];
    
    document.getElementById('resume-piso-cemento').innerText = data['piso_ceme'];
    document.getElementById('resume-piso-madera').innerText = data['piso_made'];
    document.getElementById('resume-piso-tierra').innerText = data['piso_tier'];
    document.getElementById('resume-piso-piedra').innerText = data['piso_pied'];
    document.getElementById('resume-piso-nd').innerText = data['piso_nd'];
    
    document.getElementById('resume-aguauso-potable').innerText = data['agus_pot'];
    document.getElementById('resume-aguauso-noria').innerText = data['agus_nor'];
    document.getElementById('resume-aguauso-rio').innerText = data['agus_rio'];
    document.getElementById('resume-aguauso-lluvia').innerText = data['agus_llu'];
    document.getElementById('resume-aguauso-nd').innerText = data['agus_nd'];
    
    document.getElementById('resume-aguacon-potable').innerText = data['agco_pot'];
    document.getElementById('resume-aguacon-purificada').innerText = data['agco_pur'];
    document.getElementById('resume-aguacon-hervida').innerText = data['agco_her'];
    document.getElementById('resume-aguacon-clorada').innerText = data['agco_clo'];
    document.getElementById('resume-aguacon-filtrada').innerText = data['agco_fil'];
    document.getElementById('resume-aguacon-nd').innerText = data['agco_nd'];
    
    document.getElementById('resume-exc-fosa').innerText = data['exc_fo'];
    document.getElementById('resume-exc-letrina').innerText = data['exc_le'];
    document.getElementById('resume-exc-ras').innerText = data['exc_ra'];
    document.getElementById('resume-exc-nd').innerText = data['exc_nd'];
    
    document.getElementById('resume-com-gas').innerText = data['comb_ga'];
    document.getElementById('resume-com-carbon').innerText = data['comb_ca'];
    document.getElementById('resume-com-lena').innerText = data['comb_le'];
    document.getElementById('resume-com-otros').innerText = data['comb_ot'];
    document.getElementById('resume-com-nd').innerText = data['comb_nd'];
    
    document.getElementById('resume-bas-redmun').innerText = data['bas_re'];
    document.getElementById('resume-bas-enterramiento').innerText = data['bas_en'];
    document.getElementById('resume-bas-cielo').innerText = data['bas_ci'];
    document.getElementById('resume-bas-incineración').innerText = data['bas_in'];
    document.getElementById('resume-bas-nd').innerText = data['bas_nd'];
    
    document.getElementById('resume-alu-electrica').innerText = data['alu_re'];
    document.getElementById('resume-alu-velas').innerText = data['alu_ve'];
    document.getElementById('resume-alu-quinque').innerText = data['alu_qu'];
    document.getElementById('resume-alu-placa').innerText = data['alu_pl'];
    document.getElementById('resume-alu-nd').innerText = data['alu_nd'];
    
    document.getElementById('resume-disthab-numhab').innerText = data['dh_numhab'];
    document.getElementById('resume-disthab-recama').innerText = data['dh_rec'];
    document.getElementById('resume-disthab-estanc').innerText = data['dh_est'];
    document.getElementById('resume-disthab-comedo').innerText = data['dh_com'];
    document.getElementById('resume-disthab-multip').innerText = data['dh_mul'];
    document.getElementById('resume-disthab-cocind').innerText = data['dh_coc'];
    
    document.getElementById('resume-habpviv-viv1hab').innerText = data['habviv_1'];
    document.getElementById('resume-habpviv-viv2hab').innerText = data['habviv_2'];
    document.getElementById('resume-habpviv-viv3hab').innerText = data['habviv_3'];
    document.getElementById('resume-habpviv-viv4hab').innerText = data['habviv_4'];
    document.getElementById('resume-habpviv-nd').innerText = data['habviv_nd'];
    
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

getData("ALL");
