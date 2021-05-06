/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

import java.util.Objects;

/**
 *
 * @author drwhoo
 */
public class Aide {

    public int id;
    public int categorie_id;
    public String titre;
    public String description;
    public String adresse;
    public String num_tell;
    public String lien_image;
    private float moyenne;
    private float valeur;
    private String avis; 
    public String categorie_titre;

    public String getCategorie_titre() {
        return categorie_titre;
    }

    public void setCategorie_titre(String categorie_titre) {
        this.categorie_titre = categorie_titre;
    }
    
    public float getMoyenne() {
        return moyenne;
    }

    public void setMoyenne(float moyenne) {
        this.moyenne = moyenne;
    }

    public float getValeur() {
        return valeur;
    }

    public void setValeur(float valeur) {
        this.valeur = valeur;
    }

    public String getAvis() {
        return avis;
    }

    public void setAvis(String avis) {
        this.avis = avis;
    }
    
    public String getNum_tell() {
        return num_tell;
    }

    public void setNum_tell(String num_tell) {
        this.num_tell = num_tell;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getCategorie_id() {
        return categorie_id;
    }

    public void setCategorie_id(int categorie_id) {
        this.categorie_id = categorie_id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getAdresse() {
        return adresse;
    }

    public void setAdresse(String adresse) {
        this.adresse = adresse;
    }

    public String getLien_image() {
        return lien_image;
    }

    public void setLien_image(String lien_image) {
        this.lien_image = lien_image;
    }

    public Aide() {
    }

    public Aide(int id, int categorie_id, String titre, String description, String adresse, String num_tell, String lien_image, float moyennenote, float valeur, String avis) {
        this.id = id;
        this.categorie_id = categorie_id;
        this.titre = titre;
        this.description = description;
        this.adresse = adresse;
        this.num_tell = num_tell;
        this.lien_image = lien_image;
        this.moyenne = moyenne;
        this.valeur = valeur;
        this.avis = avis;
    }

    
    public Aide(int id, int categorie_id, String titre, String description, String adresse, String num_tell, String lien_image) {
        this.id = id;
        this.categorie_id = categorie_id;
        this.titre = titre;
        this.description = description;
        this.adresse = adresse;
        this.num_tell = num_tell;
        this.lien_image = lien_image;
    }

    public Aide(int categorie_id, String titre, String description, String adresse,String num_tell) {
        this.categorie_id = categorie_id;
        this.titre = titre;
        this.description = description;
        this.adresse = adresse;
        this.num_tell = num_tell;
        
        this.lien_image = lien_image;
    }

    @Override
    public String toString() {
        return "Aide{" + "id=" + id + ", categorie_id=" + categorie_id + ", titre=" + titre + ", description=" + description + ", adresse=" + adresse + ", num_tell=" + num_tell + ", lien_image=" + lien_image + ", moyenne=" + moyenne + ", valeur=" + valeur + ", avis=" + avis + '}';
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 67 * hash + this.id;
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Aide other = (Aide) obj;
        if (this.id != other.id) {
            return false;
        }
        if (this.categorie_id != other.categorie_id) {
            return false;
        }
        if (Float.floatToIntBits(this.moyenne) != Float.floatToIntBits(other.moyenne)) {
            return false;
        }
        if (Float.floatToIntBits(this.valeur) != Float.floatToIntBits(other.valeur)) {
            return false;
        }
        if (!Objects.equals(this.titre, other.titre)) {
            return false;
        }
        if (!Objects.equals(this.description, other.description)) {
            return false;
        }
        if (!Objects.equals(this.adresse, other.adresse)) {
            return false;
        }
        if (!Objects.equals(this.num_tell, other.num_tell)) {
            return false;
        }
        if (!Objects.equals(this.lien_image, other.lien_image)) {
            return false;
        }
        if (!Objects.equals(this.avis, other.avis)) {
            return false;
        }
        return true;
    }

 

   
}
