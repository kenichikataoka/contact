<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_recipients', function (Blueprint $table) {
            $table->id();
            // form_idというbigint型のidを$table->idと同じ型で作成され、constrainedでこのカラムが外部キーであることをDBに宣言して(データベースは「form_id に入れる値が、forms テーブルの id に実在するか」を常に監視するようになります。存在しないIDを入れようとすると、DBがエラーを出して止めてくれます。ちなみにform_idとあれば、formsテーブルのidとつなぐとLaravel内部で判定する)。cascadeOnDelete()は親がいなくなったら子テーブルのデータも自動的に削除してくれる。≪form_id という名前にしておけば、constrained() の引数にテーブル名（'forms'）を書かなくても、Laravelが自動で「あ、これは forms テーブルのIDだね」と判断してくれます。≫
            $table->foreignId('form_id')->constrained()->cascadeOnDelete();
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_recipients');
    }
};
