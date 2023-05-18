<table>
                            <thead>
                                <tr>
                                    <th rowspan="1" colspan="4"></th>
                                    <th rowspan="1" colspan="7">顧客情報</th>
                                    <th rowspan="1" colspan="5">お住まいの情報</th>
                                    <th rowspan="1" colspan="6">勤務先の情報</th>
                                    <th rowspan="1" colspan="6">口座番号</th>
                                </tr>
                                <tr>
                                    <th>ステータス</th>
                                    <th>契約書PDF</th>
                                    <th>写真確認</th>
                                    <th>詳細</th>
                                    <th>お申込み日</th>
                                    <th>名前</th>
                                    <th>フリガナ</th>
                                    <th>生年月日</th>
                                    <th>性別</th>
                                    <th>メールアドレス</th>
                                    <th>パスワード</th>
                                    <th>郵便番号</th>
                                    <th>都道府県</th>
                                    <th>市区町村</th>
                                    <th>番地</th>
                                    <th>マンション名・部屋番号</th>
                                    <th>郵便番号</th>
                                    <th>都道府県</th>
                                    <th>市区町村</th>
                                    <th>番地</th>
                                    <th>マンション名・部屋番号</th>
                                    <th>電話番号</th>
                                    <th>電話番号</th>
                                    <th>支店名</th>
                                    <th>支店番号</th>
                                    <th>口座の種類</th>
                                    <th>口座番号</th>
                                    <th>口座名義(カナ)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td><?php
                                        if($data->status=='completed'){
                                        echo '契約完了';
                                        }elseif($data->status=='reviewing'){
                                            echo '審査中';
                                        }elseif($data->status=='refuse'){
                                            echo '当社断り';
                                        }else{
                                            echo '新規';
                                        }
                                    ?></td>
                                    <td>PDF化</td>
                                    <td>写真</td>
                                    <td>詳細</td>
                                    <td>{{ $data->user->created_at->format('Y年m月d日')}}</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>{{ $data->user->Furigana }}</td>
                                    <td>{{ $data->user->year }}年{{ $data->user->month }}月{{ $data->user->day }}日</td>
                                    <td>{{ $data->user->gender }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>××××××××</td>
                                    <td>〒{{ $data->postCodeBef }}-{{ $data->postCodeAfter }}</td>
                                    <td>{{ $data->district }}</td>
                                    <td>{{ $data->city }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->apartmentName }}</td>
                                    <td>〒{{ $data->postCodeComBef }}-{{ $data->postCodeComAfter }}</td>
                                    <td>{{ $data->districtCom }}</td>
                                    <td>{{ $data->cityCom }}</td>
                                    <td>{{ $data->addressCom }}</td>
                                    <td>{{ $data->apartmentNameCom }}</td>
                                    <td>{{ $data->telephoneCom }}</td>
                                    <td>{{ $data->bankName }}</td>
                                    <td>{{ $data->branchName }}</td>
                                    <td>{{ $data->teleBranch }}</td>
                                    <td>{{ $data->typeAccount }}</td>
                                    <td>{{ $data->accountName }}</td>
                                    <td>{{ $data->account }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>