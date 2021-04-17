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
public class NoteAide {
    public int id ; 
    public int user_id; 
    public int aide_id; 
    public int valeur;
    public String avis;

    public NoteAide(int user_id, int aide_id, int valeur, String avis) {
        this.user_id = user_id;
        this.aide_id = aide_id;
        this.valeur = valeur;
        this.avis = avis;
    }

    public NoteAide() {
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public NoteAide(int id, int user_id, int aide_id, int valeur, String avis) {
        this.id = id;
        this.user_id = user_id;
        this.aide_id = aide_id;
        this.valeur = valeur;
        this.avis = avis;
    }

    public int getUser_id() {
        return user_id;
    }

    public void setUser_id(int user_id) {
        this.user_id = user_id;
    }

    public int getAide_id() {
        return aide_id;
    }

    public void setAide_id(int aide_id) {
        this.aide_id = aide_id;
    }

    public int getValeur() {
        return valeur;
    }

    public void setValeur(int valeur) {
        this.valeur = valeur;
    }

    public String getAvis() {
        return avis;
    }

    public void setAvis(String avis) {
        this.avis = avis;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 97 * hash + this.id;
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
        final NoteAide other = (NoteAide) obj;
        if (this.id != other.id) {
            return false;
        }
        if (this.user_id != other.user_id) {
            return false;
        }
        if (this.aide_id != other.aide_id) {
            return false;
        }
        if (this.valeur != other.valeur) {
            return false;
        }
        if (!Objects.equals(this.avis, other.avis)) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "NoteAide{" + "id=" + id + ", user_id=" + user_id + ", aide_id=" + aide_id + ", valeur=" + valeur + ", avis=" + avis + '}';
    }
    
}
