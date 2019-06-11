 export class Popup {
   private _container: JQuery<HTMLElement>;
   private _isEdit: boolean;

   constructor(id: string) {
     this._container = $('#' + id);
   }

   public hide() {
     this._container.modal('hide');
   }

   public show(func?: any) {
     this._container.modal('show');
     if (this._isEdit && func)
     {
       const element: string = '#jsTypeSelect option[value=\'' + func.type + '\']';
       this._container.find(element).prop('selected', 'true');
       this._container.find('#jsFunctionId').val(func.id);
       this._container.find('#jsAmplitude').val(func.amplitude);
       this._container.find('#jsFrequency').val(func.frequency);
       this._container.find('#jsPhase').val(func.phase);
     }
   }

   public setIsEdit(isEdit: boolean) {
     this._isEdit = isEdit;
   }

   public clear() {
     this.setIsEdit(false);
     this._container.find('#jsFunctionId').val('');
     this._container.find('#jsAmplitude').val('');
     this._container.find('#jsTypeSelect option[value=\'sin\']').prop('selected', 'true');
     this._container.find('#jsFrequency').val('');
     this._container.find('#jsPhase').val('');
   }

   public getData() {
     const typeSelect = this._container.find('#jsTypeSelect');
     const selectedType = typeSelect.children("option:selected").val();
     return {
       id: this._container.find('#jsFunctionId').val(),
       type: selectedType,
       amplitude: this._container.find('#jsAmplitude').val(),
       frequency: this._container.find('#jsFrequency').val(),
       phase: this._container.find('#jsPhase').val(),
     };
   }

   public addSubmitListener(callback: any) {
     this._container.find('#saveItemButton').on('click', callback);
   }

   public isEdit(): boolean {
     return this._isEdit;
   }
 }