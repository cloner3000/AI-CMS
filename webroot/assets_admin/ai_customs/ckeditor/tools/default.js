import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import UploadAdapterPlugin from '@ckeditor/ckeditor5-adapter-ckfinder/src/uploadadapter';
import AutoformatPlugin from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
import BlockQuotePlugin from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import EasyImagePlugin from '@ckeditor/ckeditor5-easy-image/src/easyimage';
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import ImagePlugin from '@ckeditor/ckeditor5-image/src/image';
import ImageCaptionPlugin from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageStylePlugin from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImageToolbarPlugin from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageUploadPlugin from '@ckeditor/ckeditor5-image/src/imageupload';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';
import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import MediaEmbedPlugin from '@ckeditor/ckeditor5-media-embed/src/mediaembed';
import AlignmentPlugin from '@ckeditor/ckeditor5-alignment/src/alignment';
import TablePlugin from '@ckeditor/ckeditor5-table/src/table';
import TableToolbarPlugin from '@ckeditor/ckeditor5-table/src/tabletoolbar';


// Plugins to include in the build.
ClassicEditor.builtinPlugins = [
    EssentialsPlugin,
        AutoformatPlugin,
        BoldPlugin,
        ItalicPlugin,
        BlockQuotePlugin,
        HeadingPlugin,
        EasyImagePlugin,
        ImagePlugin,
        ImageCaptionPlugin,
        ImageStylePlugin,
        ImageToolbarPlugin,
        EasyImagePlugin,
        ImageUploadPlugin,
        LinkPlugin,
        ListPlugin,
        ParagraphPlugin,
        UploadAdapterPlugin,
        MediaEmbedPlugin,
        AlignmentPlugin,
        TablePlugin,
        TableToolbarPlugin
];

// Editor configuration.
ClassicEditor.defaultConfig = {
    toolbar: [
        'heading',
        'bold',
        'italic',
        '|',
        'alignment:left', 
        'alignment:right', 
        'alignment:center',
        'alignment:justify',
        'link',
        'bulletedList',
        'numberedList',
        '|',
        'imageUpload',
        'mediaEmbed',
        '|',
        'insertTable',
        'blockQuote',
        'undo',
        'redo'
    ],
    image: {
        toolbar: [
            'imageStyle:full',
            'imageStyle:side',
            '|',
            'imageTextAlternative'
        ]
    },
    table: {
        contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
    }
};

$.each(textEditor,function(e,item){
    console.log(item)
    ClassicEditor
    .create( document.querySelector(item), {
        cloudServices: {
            tokenUrl: urlToken,
            uploadUrl: urlUpload
        },
    } )
    .then( editor => {
        console.log( editor );
    } );
})
