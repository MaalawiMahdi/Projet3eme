/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import CubicChart.CubicChart;
import HolidaysHiatus.entities.Aide;
import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.services.AideService;
import HolidaysHiatus.services.CategorieAideService;
import com.codename1.charts.ChartComponent;
import com.codename1.charts.models.CategorySeries;
import com.codename1.charts.renderers.DefaultRenderer;
import com.codename1.charts.renderers.SimpleSeriesRenderer;
import com.codename1.charts.util.ColorUtil;
import com.codename1.charts.views.LineChart;
import com.codename1.charts.views.PieChart;
import com.codename1.ui.Component;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.list.ContainerList;
import com.codename1.ui.list.ListModel;
import java.util.ArrayList;
import java.util.List;
import javafx.scene.chart.XYChart.Series;

/**
 *
 * @author LENOVO
 */
public class StatAideForm extends Form{
 Form Current;
  List <Aide> m =new ArrayList(AideService.getInstance().statdata());  
   Label label1 ;
   Label label2 ;
public StatAideForm() {
    super(new BorderLayout(BorderLayout.CENTER_BEHAVIOR_CENTER_ABSOLUTE));
  
    CubicChart c = new CubicChart();
       Container titre = new Container (BoxLayout.y());
       Container  titres = new Container (BoxLayout.y());
       Container  all = new Container (BoxLayout.y());
    
       titres.setLayout(BoxLayout.y());    
            for (int i=1 ;i<m.size()/2+1;i++)
        {label1=new Label();label2=new Label();
            label1.setText(i +m.get(i-1).getTitre());
        titre.add(label1);
        label2.setText((i+1)+m.get(i).getTitre());
        
                titre.add(label2);
               
        }
           for (int i=m.size()/2 ;i<m.size();i++)
        {label1=new Label();label2=new Label();
        label1.setText(i +m.get(i-1).getTitre()+"   ");
        
        titres.add(label1);
                if (m.get(i)!=null){
                     label2.setText((i+1)+m.get(i).getTitre());
                titres.add(label2);
                }
        }
          label1.setUIID("labelstat");
       label1.setUIID("labelstat");
      Container titreX= new Container(BoxLayout.x());
      titreX.addAll(titre,titres);
      all.addAll(c.execute(),titreX);
      
    this.add(BorderLayout.CENTER,all);
    this.setScrollableY(true);
    this.setScrollable(true);
    getToolbar().addCommandToSideMenu(" ", null, (event) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (event) -> {
        });
        getToolbar().addCommandToSideMenu(" ", null, (event) -> {
        });
         getToolbar().addMaterialCommandToSideMenu("Categorie Aide", FontImage.MATERIAL_CATEGORY, (evt) -> {
            new ListCatAideBackForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Aide", FontImage.MATERIAL_ASSISTANT_DIRECTION, (evt) -> {
            new ListAideBackForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Statistiques Aide", FontImage.MATERIAL_GRAPHIC_EQ, (event) -> {
            new StatAideForm().show();
        });
        getToolbar().addMaterialCommandToSideMenu(" Statistiques catAide", FontImage.MATERIAL_GRAPHIC_EQ, (event) -> {
            new StatCategorieAideForm().show();
        });

}
    
}
