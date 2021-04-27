/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.entites;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;

/**
 *
 * @author DELL
 */
public class Panier {

public List<ArticlePanier> articles;
public float total;





public Panier() {
this.articles = new ArrayList();
total=0;

}

    @Override
    public String toString() {
        return "Panier{" + "articles=" + articles + ", total=" + total + '}';
    }






 




}
