import {ControlView} from "../view/ControlView";
import {GraphicView} from "../view/GraphicView";
import {HarmonicFunctionCollection} from "../model/collection/HarmonicFunctionCollection";
import {ControlPresenter} from "../presenter/ControlPresenter";
import {GraphicPresenter} from "../presenter/GraphicPresenter";
import {TableView} from "../view/TableView";
import {TablePresenter} from "../presenter/TablePresenter";
import {ITableView} from "../view/ITableView";
import {IGraphicView} from "../view/IGraphicView";

export class Editor {
  constructor() {
    const model = new HarmonicFunctionCollection();

    const controlView = new ControlView();
    const graphicView = new GraphicView('graphicContainer');
    const tableView = new TableView('tableContainer');

    const controlPresenter = new ControlPresenter(controlView, model);
    const graphicPresenter = new GraphicPresenter(graphicView, model);
    const tablePresenter = new TablePresenter(tableView, model);
    controlView.setPresenter(controlPresenter);
    graphicView.setPresenter(graphicPresenter);
    tableView.setPresenter(tablePresenter);

    graphicPresenter.drawGraph();
    tablePresenter.drawTable();
    this.addEventListenerSwitchVisualView(graphicView, tableView);
  }

  private addEventListenerSwitchVisualView(graphicView: IGraphicView, tableView: ITableView) {
    $('#graphicViewButton').on('click', ()=> {
      tableView.hide();
      graphicView.show();
    });
    $('#tableViewButton').on('click', ()=> {
      graphicView.hide();
      tableView.show();
    });
  }
}