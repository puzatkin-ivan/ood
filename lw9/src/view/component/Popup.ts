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
       $('#deleteItemButton').show();
       const element: string = '#typeSelect option[value=\'' + func.type + '\']';
       this._container.find(element).prop('selected', 'true');
       this._container.find('#functionId').val(func.id);
       this._container.find('#amplitude').val(func.amplitude);
       this._container.find('#frequency').val(func.frequency);
       this._container.find('#phase').val(func.phase);
     }
   }

   public setIsEdit(isEdit: boolean) {
     this._isEdit = isEdit;
   }

   public clear() {
     this.setIsEdit(false);
     this._container.find('#functionId').val('');
     this._container.find('#amplitude').val('');
     this._container.find('#typeSelect option[value=\'sin\']').prop('selected', 'true');
     this._container.find('#frequency').val('');
     this._container.find('#phase').val('');
     $('#deleteItemButton').hide();
   }

   public getData() {
     const typeSelect = this._container.find('#typeSelect');
     const selectedType = typeSelect.children("option:selected").val();
     return {
       id: this._container.find('#functionId').val(),
       type: selectedType,
       amplitude: this._container.find('#amplitude').val(),
       frequency: this._container.find('#frequency').val(),
       phase: this._container.find('#phase').val(),
     };
   }

   public addSubmitListener(callback: any) {
     this._container.find('#saveItemButton').on('click', callback);
   }

   public addDeleteListener(callback: any) {
     $('#deleteItemButton').on('click', callback);
   }

   public isEdit(): boolean {
     return this._isEdit;
   }
 }