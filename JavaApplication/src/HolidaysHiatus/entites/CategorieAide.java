/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

import com.lowagie.text.BadElementException;
import com.lowagie.text.Image;
import java.io.IOException;
import java.util.Objects;

/**
 *
 * @author drwhoo
 */
public class CategorieAide {

    public int id;
    public String titre;
    public String lien_icon;
 

   

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitre() {
        return titre;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public String getLien_icon() {
        return lien_icon;
    }

    public void setLien_icon(String lien_icon) {
        this.lien_icon = lien_icon;
    }
    public CategorieAide(int id ,String titre) {
        this.titre = titre;
        this.id = id;
        this.lien_icon = lien_icon;
    }


    public CategorieAide(String titre, String lien_icon) {
        this.titre = titre;
        this.lien_icon = lien_icon;
    }

    public CategorieAide() {
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 97 * hash + this.id;
      
        return hash;
    }

    @Override
    public String toString() {
        return "CategorieAide{" + "id=" + id + ", titre=" + titre + ", lien_icon=" + lien_icon + '}';
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
        final CategorieAide other = (CategorieAide) obj;
        if (this.id != other.id) {
            return false;
        }
        if (!Objects.equals(this.titre, other.titre)) {
            return false;
        }
        if (!Objects.equals(this.lien_icon, other.lien_icon)) {
            return false;
        }
        return true;
    }

    public CategorieAide(String titre) {
        this.titre = titre;
    }

    public CategorieAide(int id, String titre, String lien_icon) {
        this.id = id;
        this.titre = titre;
        this.lien_icon = lien_icon;
        
    }
    
}
