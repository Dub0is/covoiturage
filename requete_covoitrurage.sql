-- a. Afficher pour chaque leçon, le moniteur, la voiture (éventuelle) et le nombre d'inscrits.
select *, count(rec_client) nbinscrit
from all_lecon, moniteur,recevoir
where lec_moniteur=mon_id and rec_lecon=lec_id
group by lec_id;

-- b. Afficher le nombre de leçons de type conduite par client.
select client.*, count(rec_lecon) nblecon
from client, recevoir, lecon
where cli_id=rec_client and lec_id=rec_lecon
and lec_type="conduite"
group by cli_id;

-- c. Afficher le nombre de leçons de type code par client.
select client.*, count(rec_lecon) nblecon
from client, recevoir, lecon
where cli_id=rec_client and lec_id=rec_lecon
and lec_type="code"
group by cli_id;
-- d. Afficher le nombre de leçons par mois.
select month(lec_date) mois, count(lec_id) nb 
from lecon
group by mois
order by mois;

-- e. Afficher le nombre d'heure de leçon par mois et par moniteur.
select month(lec_date) mois, mon_id, mon_nom, sum(timediff(lec_hfin, lec_hdebut))/3600 duree 
from lecon, moniteur 
where lec_moniteur=mon_id 
group by mois,mon_id 

-- f. Afficher la liste des leçons entre le 2024-11-01 00:00:00 et le 2024-11-01 23:59:59.
select distinct lec_moniteur
from lecon
where lec_date='2024-11-02'

-- g. Afficher la liste des moniteurs disponibles entre le 2024-11-01 00:00:00 et le 2024-11-01 23:59:59.
select *
from moniteur 
where mon_id not in (select distinct lec_moniteur from lecon where lec_date='2024-11-02');

-- h. Afficher la liste des voitures disponibles entre le 2024-11-01 00:00:00 et le 2024-11-01 23:59:59.
-- lisite des voitures occupées le 4 nov
select distinct lec_voiture from lecon where lec_date='2024-11-04' and lec_voiture is not null;

select *
from voiture
where voi_id not in (select distinct lec_voiture from lecon where lec_date='2024-11-04' and lec_voiture is not null);

-- i. Afficher le nombre d'heure de leçon par client.
select cli_id,cli_nom, sum(timediff(lec_hfin, lec_hdebut))/3600 duree 
from lecon, recevoir, client 
where lec_id=rec_lecon  and cli_id=rec_client
group by cli_id 

-- j. Afficher la voiture ayant participer au plus grand nombre de lecon.
-- nombre de lecon par voiture
select voi_id, count(lec_id) nblecon
from voiture, lecon
where voi_id=lec_voiture
group by voi_id
order by nblecon desc
limit 0,1

-- Création de vue
create or replace view all_lecon as 
select * from lecon left join voiture on lec_voiture=voi_id;




