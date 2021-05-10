/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package HolidaysHiatus.gui;

import HolidaysHiatus.entities.CategorieAide;
import HolidaysHiatus.gui.ListAideBackForm;
import HolidaysHiatus.gui.ListCatAideBackForm;
import HolidaysHiatus.gui.StatAideForm;
import HolidaysHiatus.services.CategorieAideService;

import com.codename1.charts.ChartComponent;
import com.codename1.charts.models.CategorySeries;
import com.codename1.charts.renderers.DefaultRenderer;
import com.codename1.charts.renderers.SimpleSeriesRenderer;
import com.codename1.charts.util.ColorUtil;
import static com.codename1.charts.util.ColorUtil.rgb;
import com.codename1.charts.views.PieChart;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BorderLayout;

import java.util.ArrayList;
import java.util.List;
import static jdk.nashorn.internal.objects.NativeMath.random;

/**
 *
 * @author LENOVO
 */
public class StatCategorieAideForm extends Form{
    /**
 * Creates a renderer for the specified colors.
 */ List<CategorieAide> cats =new ArrayList(CategorieAideService.getInstance().getAllCatAides());
 int colors[];
private DefaultRenderer buildCategoryRenderer(int[] colors) {
    colors=new int[cats.size()];
    DefaultRenderer renderer = new DefaultRenderer();
    renderer.setLabelsTextSize(0);
    renderer.setLegendTextSize(40);
    
    renderer.setMargins(new int[]{20, 30, 15, 0});
  int i=0;
    for (CategorieAide a : cats) {

      
          int  vert  = (int)(random(1)*255.99);
           int  bleu  = (int)(random(1)*255.99);
           int  rouge = (int)(random(1)*255.99);
      
        SimpleSeriesRenderer r = new SimpleSeriesRenderer();
        colors[i]=rgb(vert,bleu,rouge);
        r.setColor(colors[i]);
        renderer.addSeriesRenderer(r);
}
   
    return renderer;
}

/**
 * Builds a category series using the provided values.
 *
 * @param titles the series titles
 * @param values the values
 * @return the category series
 */
protected CategorySeries buildCategoryDataset(String title, double[] values) {
    CategorySeries series = new CategorySeries(title);
   
    for (CategorieAide a :cats  )
    { series.add(a.getTitre(), a.getNbaide());
    }
       
       

    return series;
}

public StatCategorieAideForm() {
    // Generate the values
            super(new BorderLayout(BorderLayout.CENTER_BEHAVIOR_CENTER_ABSOLUTE));

    double[] values = new double[]{};

    // Set up the renderer
    DefaultRenderer renderer = buildCategoryRenderer(colors);
    renderer.setZoomButtonsVisible(true);
    renderer.setZoomEnabled(true);
    renderer.setDisplayValues(true);
    renderer.setShowLabels(false);
    SimpleSeriesRenderer r = renderer.getSeriesRendererAt(0);
    r.setGradientEnabled(true);
    r.setGradientStart(0, ColorUtil.BLUE);
    r.setGradientStop(0, ColorUtil.BLUE);
    r.setHighlighted(true);

    // Create the chart ... pass the values and renderer to the chart object.
    PieChart chart = new PieChart(buildCategoryDataset("Project budget", values), renderer);

    // Wrap the chart in a Component so we can add it to a form
    ChartComponent c = new ChartComponent(chart);

    // Create a form and show it.
    setTitle("Statistiques Categorie Aide ");  
    add(BorderLayout.CENTER, c);
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
