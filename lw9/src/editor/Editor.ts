import {ControlView} from "../view/ControlView";
import {GraphicView} from "../view/GraphicView";
import {HarmonicFunctionCollection} from "../model/collection/HarmonicFunctionCollection";
import {ControlPresenter} from "../presenter/ControlPresenter";
import {GraphicPresenter} from "../presenter/GraphicPresenter";

export class Editor {
  constructor() {
    const model = new HarmonicFunctionCollection();

    const controlView = new ControlView();
    const graphicControlView = new GraphicView();

    const controlPresenter = new ControlPresenter(controlView, model);
    const graphicPresenter = new GraphicPresenter(graphicControlView, model);
    controlView.setPresenter(controlPresenter);
    graphicControlView.setPresenter(graphicPresenter);

    graphicPresenter.drawGraph();
  }
}