
export interface IControlPresenter {
  addHarmonicFunction(newFunc: any);

  removeHarmonicFunctionAtIndex(index: number);

  editHarmonicFunctionAtIndex(index: number, newFunc: any);

  showCreateFunctionForm();

  showEditFunctionForm(index: number);
}