/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.services;

import HolidaysHiatus.entities.ArticlePanier;
import HolidaysHiatus.entities.ProduitService;
import java.util.Iterator;
import java.util.Map;

/**
 *
 * @author DELL
 */
public interface PanierService  {
   
    public void ajouterArticle(ProduitService art, int qte) ;





public void supprimerArticle(ArticlePanier article);





public int calculerPanier() ;
}