/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entities;

import java.util.Objects;

/**
 *
 * @author DELL
 */
public class ProduitService {
   public Integer id ;
   public Integer id_categorie ;
   public String titre ; 
   public String description ;
   public String lien_image ;
   public String type ;
   public float prix_unitaire ;
   public Integer id_board;

    public Integer getId_board() {
        return id_board;
    }

    public void setId_board(Integer id_board) {
        this.id_board = id_board;
    }

    public ProduitService(Integer id_categorie, String titre, String description, String type, float prix_unitaire, Integer id_board) {
        this.id_categorie = id_categorie;
        this.titre = titre;
        this.description = description;
        this.type = type;
        this.prix_unitaire = prix_unitaire;
        this.id_board = id_board;
    }

    public ProduitService(Integer id, Integer id_categorie, String titre, String description, String lien_image, String type, float prix_unitaire, Integer id_board) {
        this.id = id;
        this.id_categorie = id_categorie;
        this.titre = titre;
        this.description = description;
        this.lien_image = lien_image;
        this.type = type;
        this.prix_unitaire = prix_unitaire;
        this.id_board = id_board;
    }

    public ProduitService(Integer id, Integer id_categorie, String titre, String description, String type, float prix_unitaire) {
        this.id = id;
        this.id_categorie = id_categorie;
        this.titre = titre;
        this.description = description;
        this.type = type;
        this.prix_unitaire = prix_unitaire;
    }
   
    public ProduitService() {
    }

    public ProduitService(Integer id, String titre, String description, String lien_image, String type, float prix_unitaire) {
        this.id = id;
        this.titre = titre;
        this.description = description;
        this.lien_image = lien_image;
        this.type = type;
        this.prix_unitaire = prix_unitaire;
    }

    public Integer getId() {
        return id;
    }

    public ProduitService(Integer id, Integer id_categorie, String titre, String description, String lien_image, String type, float prix_unitaire) {
        this.id = id;
        this.id_categorie = id_categorie;
        this.titre = titre;
        this.description = description;
        this.lien_image = lien_image;
        this.type = type;
        this.prix_unitaire = prix_unitaire;
    }

    public void setId_categorie(Integer id_categorie) {
        this.id_categorie = id_categorie;
    }

    public Integer getId_categorie() {
        return id_categorie;
    }

    public String getTitre() {
        return titre;
    }

    public String getDescription() {
        return description;
    }

    public String getLien_image() {
        return lien_image;
    }

    public String getType() {
        return type;
    }

    public float getPrix_unitaire() {
        return prix_unitaire;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public void setTitre(String titre) {
        this.titre = titre;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public void setLien_image(String lien_image) {
        this.lien_image = lien_image;
    }

    public void setType(String type) {
        this.type = type;
    }

    public void setPrix_unitaire(float prix_unitaire) {
        this.prix_unitaire = prix_unitaire;
    }
   
      @Override
    public String toString() {
        return "produit_service{" + "id=" + id + ", id_categorie=" + id_categorie + ", titre=" + titre + ", description=" + description + ", lien_image=" + lien_image + ", type=" + type+ ", prix_unitaire=" + prix_unitaire + '}';
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 89 * hash + Objects.hashCode(this.id);
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
        final ProduitService other = (ProduitService) obj;
        if (!Objects.equals(this.id, other.id)) {
            return false;
        }
        return true;
    }
    
}
