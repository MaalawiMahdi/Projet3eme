package HolidaysHiatus.gui;

import com.codename1.charts.ChartComponent;
import com.codename1.charts.models.CategorySeries;
import com.codename1.charts.renderers.DefaultRenderer;
import com.codename1.charts.renderers.SimpleSeriesRenderer;
import com.codename1.charts.util.ColorUtil;
import com.codename1.charts.views.PieChart;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

import HolidaysHiatus.entities.CategorieBoard;
import HolidaysHiatus.services.BoardService;
import HolidaysHiatus.services.CategorieBoardService;

public class Piechart extends Form {
	String[] names =new String[5];
	
	private Resources theme;
	public Piechart(String title, Resources theme) {
       super(title, BoxLayout.y());
       this.theme = theme;
       this.createPieChartForm().show();
       }
	
	private DefaultRenderer buildCategoryRenderer(int[] colors) {
	    DefaultRenderer renderer = new DefaultRenderer();
	    renderer.setLabelsTextSize(150);
	    renderer.setLegendTextSize(150);
	    renderer.setMargins(new int[]{20, 30, 15, 0});
	    for (int color : colors) {
	        SimpleSeriesRenderer r = new SimpleSeriesRenderer();
	        r.setColor(color);
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
	    int k = 0;
	    for (double value : values) {
	        series.add(names[k], value);
	        k++;
	    }

	    return series;
	}

	public Form createPieChartForm() {
		 
	    // Generate the values
        CategorieBoardService ss = new CategorieBoardService();
    	BoardService bb = new BoardService();
int i=0;
	    double values[]=new double [ss.getCategorie().size()];
	    for (CategorieBoard s : ss.getCategorie() ) {
	    	System.out.println("le nombre est "+bb.getCnbr(s.getId()));
	    	values[i]=bb.getCnbr(s.getId()); 
	    	names[i]=s.getTitre();
	    		i++;
	    		}
		// Set up the renderer
	    int[] colors = new int[]{ColorUtil.rgb(255,212,212), ColorUtil.rgb(255,160,122), ColorUtil.rgb(220,20,60), ColorUtil.YELLOW, ColorUtil.rgb(183,60,72)};
	    DefaultRenderer renderer = buildCategoryRenderer(colors);
	    renderer.setZoomButtonsVisible(true);
	    renderer.setZoomEnabled(true);
	    renderer.setChartTitleTextSize(20);
	   renderer.setLegendTextSize(70);
	   renderer.isShowLegend();
  //renderer.setScale(CENTER);
   renderer.setShowGrid(true);
   
	   renderer.setLabelsColor(000000);
	    renderer.setLabelsColor(000000);
	    renderer.setLabelsTextSize(50);
	    renderer.setDisplayValues(true);
	    renderer.setShowLabels(true);
	    SimpleSeriesRenderer r = renderer.getSeriesRendererAt(0);
	    r.setGradientEnabled(true);
	    r.setGradientStart(0, ColorUtil.BLUE);
	    r.setGradientStop(0, ColorUtil.GREEN);
	    r.setHighlighted(true);

	    // Create the chart ... pass the values and renderer to the chart object.
	    PieChart chart = new PieChart(buildCategoryDataset("Project budget", values), renderer);

	    // Wrap the chart in a Component so we can add it to a form
	    ChartComponent c = new ChartComponent(chart);

	    // Create a form and show it.
	    Form f = new Form("Statistique", new BorderLayout());
	    f.add(BorderLayout.CENTER, c);
	    f.show();
	    f.getToolbar().addCommandToLeftBar("Retour",null,(evt)->{
        	
      	  FormBoard f1 = new FormBoard("Categorie Boards",theme,22);
            f1.show();});
	   return f;

	}
}
